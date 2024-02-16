<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\TicketApprovedNotification;
use App\Notifications\TicketSolvedNotification;
use App\Notifications\TicketRejectedbyICTNotification;
use App\Notifications\TicketEscalated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;
use App\Models\systemRights;
use App\Jobs\ReleaseLockedTickets;
use App\Traits\ActivityLoggingTrait;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Jobs\SendTicketSolvedNotification;
use App\Jobs\SendTicketEscalated;
use App\Jobs\sendTicketRejectedbyICTNotification;
use App\Http\Controllers\AdminChartController;
class AdminController extends Controller
{
    use ActivityLoggingTrait;
    protected $adminChartController;

    public function __construct(AdminChartController $adminChartController)
    {
        $this->adminChartController = $adminChartController;
    }
    public function index()
    {
        $currentUserId = auth()->user()->id;
        $user = auth()->user(); // Get the logged-in user
        if ($user->role_id == 3) {
            $tickets = Ticket::where("TicketStatus", "open")
                ->where("HodApprovalStatus", "Approved")
                ->orderBy("id", "desc")
                ->paginate(8);

            $ticketsCount = Ticket::count();
            $UsersCount = User::orderBy("id", "desc")->count();
            $approvedTicketCount = Ticket::where(
                "HodApprovalStatus",
                "Approved"
            )->count();
            $UnapprovedTicketCounts = Ticket::where(
                "HodApprovalStatus",
                "Unapproved"
            )->count();
            $AssignedTicketCount = Ticket::with("Assignedto")
                ->where("HodApprovalStatus", "Approved")
                ->whereNotNull("Solvedby")
                ->count();

            $ClosedTicketCount = Ticket::where("HodApprovalStatus", "Approved")
                ->whereNotNull("Solvedby")
                ->where("TicketStatus", "closed")
                ->count();

            $OpenTicketCount = Ticket::where("HodApprovalStatus", "approved")
                ->where("TicketStatus", "open")
                ->whereNull("Solvedby")
                ->count();

           // Assigned to Logged in Admin
            $MyAssignedGenTickets = Ticket::where("HodApprovalStatus", "Approved")
                                    ->where(function ($query) use ($user) {
                                        $query->where("TicketStatus", "open")
                                            ->where("Assignedto", $user->id);
                                    })
                                    ->orWhere(function ($query) use ($user) {
                                        $query->where("EscalatedTo", $user->id)
                                            ->where("TicketStatus", "open");
                                    })
                                    
                                    ->orderBy("id", "desc")
                                    ->paginate(8);



                                    
            // Assigned to Logged in Admin
            $MyAssignedRightsTickets = systemRights::join(DB::raw('(SELECT MAX(id) as max_id, ticket_No 
                                        FROM system_rights_requisition
                                        WHERE HodApprovalStatus = "1"
                                        AND ((TicketStatus = "open" AND Assignedto = ' . $user->id . ')
                                        OR (EscalatedTo = ' . $user->id . ' AND TicketStatus = "open"))
                                        GROUP BY ticket_No) as subquery'),
                                        function ($join) {
                                        $join->on('system_rights_requisition.id', '=', 'subquery.max_id');
                                        })
                                        ->select('system_rights_requisition.*')
                                        ->orderBy("subquery.max_id", "desc")
                                        ->paginate(6);

            $MyAssignedTickets = DB::table("invoices")
                ->select(
                    DB::raw('IFNULL(ticket_No, "No Ticket") as ticket_No'),
                    DB::raw("MAX(id) as invoice_id"),
                    DB::raw("MAX(section_head1) as invoice_section_head1"),
                    DB::raw("MAX(Correction_Type) as invoice_ticket_details"),
                    DB::raw(
                        "MAX(HodApprovalStatus) as invoice_approval_status"
                    ),
                    DB::raw("MAX(hiddenApproverName) as approver_name"),
                    DB::raw("MAX(TicketStatus) as invoice_ticket_status"),
                    DB::raw("MAX( AdminStatus) as invoice_admin_status"),
                    DB::raw("MAX( worker_id) as invoice_worker_id"),
                    DB::raw("MAX(AssignedtoName) as invoice_assigned_to"),

                    DB::raw("MAX(created_at) as invoice_date_created"),
                    DB::raw("MAX(Solvedby) as invoice_ticket_solvedby"),
                    DB::raw("MAX(documents) as invoice_document_attached"),
                    DB::raw("MAX(TicketCategory) as invoice_TicketCategory")
                )
                ->where("HodApprovalStatus", "approved")
                ->where("TicketStatus", "open")
                ->where(function ($q) use ($currentUserId) {
                    $q->where("Assignedto", $currentUserId); // Add this condition
                })
                ->groupBy("ticket_No");
            $systemRightsItems = DB::table("system_rights_requisition")
                ->select(
                    DB::raw('IFNULL(ticket_No, "No Ticket") as ticket_No'),
                    DB::raw("MAX(id) as rights_id"),
                    DB::raw("MAX(Requester_Name) as ticket_section_head1"),
                    DB::raw("MAX(TicketCategory) as rights_ticket_details"),
                    DB::raw("MAX(HodApprovalStatus) as rights_approval_status"),
                    DB::raw("MAX(hiddenApproverName) as rights_approver_name"),
                    DB::raw("MAX(TicketStatus) as rights_ticket_status"),
                    DB::raw("MAX( AdminStatus) as rights_admin_status"),
                    DB::raw("MAX( worker_id) as rights_worker_id"),
                    DB::raw("MAX(AssignedtoName) as rights_assigned_to"),
                    DB::raw("MAX(created_at) as rights_date_created"),
                    DB::raw("MAX(Solvedby)as rights_ticket_solvedby"),
                    DB::raw("MAX(documents) as rights_document_attached"),
                    DB::raw("MAX(TicketCategory) as rights_TicketCategory")
                )
                ->where("HodApprovalStatus", "1")
                ->where("TicketStatus", "open")
                ->where(function ($q) use ($currentUserId) {
                    $q->where("Assignedto", $currentUserId); 
                })
                ->groupBy("ticket_No");

            $combinedResults = $MyAssignedTickets
                ->union($systemRightsItems)
                ->orderBy("ticket_No", "desc")
                ->paginate(20);

            $TicketsRejectedByICT = Ticket::where(
                "HodApprovalStatus",
                "approved"
            )
                ->whereNotNull("Solvedby")
                ->where("TicketStatus", "rejected")
                ->count();
            //Retrieve Admins
            $Admins = User::where("role_id", 3)
                ->orderBy("LeaveStatus", "desc")
                ->get();
            /*
            |------------------------------------------------------------------------------
            | Department Tickets
            |------------------------------------------------------------------------------
            */
            $DepartmentAssignedTickets = Ticket::where("TicketStatus", "open")
                                        ->where("HodApprovalStatus", "Approved")
                                        ->whereNotIn("Assignedto", [$user->id])
                                        ->orderBy("id", "desc")
                                        ->paginate(6);
            $DepartmentAssignedRightsTickets = systemRights::join(DB::raw('(SELECT MAX(id) as max_id, ticket_No 
                                        FROM system_rights_requisition
                                        WHERE HodApprovalStatus = "1"
                                        AND ((TicketStatus = "open"))
                                        GROUP BY ticket_No) as subquery'),
                                        function ($join) {
                                        $join->on('system_rights_requisition.id', '=', 'subquery.max_id');
                                        })
                                        ->select('system_rights_requisition.*')
                                        ->orderBy("subquery.max_id", "desc")
                                        ->paginate(6);
            /*
            |------------------------------------------------------------------------------
            | Department Tickets
            |------------------------------------------------------------------------------
            */
            $successMessage = session("success"); // Retrieve the success message from the session
            $adminStats = $this->adminChartController->generateChart(); //BarChart
            $adminStats2 = $this->adminChartController->generateAdminStats(); //PieChart
            $adminStats3 = $this->adminChartController->generateTicketsStats(); //Tickets Bar
            return view(
                "Admin.index",
                compact(
                    "tickets",
                    "approvedTicketCount",
                    "UnapprovedTicketCounts",
                    "AssignedTicketCount",
                    "ClosedTicketCount",
                    "UsersCount",
                    "ticketsCount",
                    "OpenTicketCount",
                    "combinedResults",
                    "DepartmentAssignedTickets",
                    "TicketsRejectedByICT",
                    "successMessage",
                    "adminStats",
                    "adminStats2",
                    "adminStats3",
                    "adminStats",
                    "Admins",
                    "MyAssignedGenTickets",
                    "MyAssignedRightsTickets",
                    "DepartmentAssignedRightsTickets",
                )
            );
        } else {
            abort(403);
        }
    }
    /*
    |------------------------------------------------------------------------------------
    | Edit 
    |-----------------------------------------------------------------------------------

    */
    public function edit(Ticket $ticket)
    {
        $user = auth()->user();
        //Retrieve Admins
        $Admins = User::where("role_id", 3)
            ->orderBy("LeaveStatus", "desc")
            ->get();
    
        if ($user->role_id == 3) {
            DB::transaction(function () use ($ticket) {
                if ($ticket->AdminStatus !== "being worked on") {
                    $ticket->worker_id = auth()->user()->id;
                    $ticket->AdminStatus = "being worked on";
                    $ticket->save();
    
                    // Log the activity
                    ActivityLog::create([
                        'user_id' => auth()->user()->id,
                        'action' => 'Viewed',
                        'record_id' => $ticket->id,
                        'description' => 'Ticket edited and being worked on.',
                    ]);
                }
            });
    
            // Retrieve the activity logs for the ticket
            $ticketWithLogs = Ticket::with('activityLogs')->findOrFail($ticket->id);
    
            return view("Admin.edit", compact("ticket","ticketWithLogs", "Admins"));
        } else {
            return redirect()->route("admin.index");
        }
    }
    /*
    |----------------------------------------------------------------
    |   Manual Ticket Relaease
    |----------------------------------------------------------------
    */
    public function release(Ticket $ticket)
    {
        $ticket->worker_id = null;
        $ticket->AdminStatus = "released";
        $ticket->save();
        return redirect()
            ->route("admin.index")
            ->with("success", "Ticket released successfully.");
    }
    /*
    |-------------------------------------------------------------
    |  Ticket Auto-Release 
    |-------------------------------------------------------------
    */
    public function AutoReleaseTicket()
    {
        dispatch(new ReleaseLockedTickets());
    }
    public function escalate(Request $request, Ticket $ticket)
    {
        $escalatedToUserId = $request->input("EScalatedto");
        $ticket->EScalatedto = $request->input("EScalatedto");
        $ticket->EScalatedBy = $request->input("EScalatedBy");
        $ticket->EscalatorComments = $request->input("EscalatorComments");
        $ticket->save();

        $chosenUser = User::find($escalatedToUserId);
        if ($chosenUser) {
            $chosenUserEmail = $chosenUser->email;

            $user = User::find($escalatedToUserId); // Get the user
            dispatch(new SendTicketEscalated($ticket, $user));
            $this->logActivity(
                auth()->user(),
                $ticket,
                "Escalated",
                "Ticket Escalated to Next Techinian"
            ); //Action Log
            return redirect()
                ->route("admin.index")
                ->with("success", "Ticket escalated successfully.");
        }
    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->all();

        //Check if ITTechnicianComments is blank before updating
        if (empty($ticket->ITTechnicianComments)) {
            $ticket->ITTechnicianComments = $data["ITTechnicianComments"];
        }

        $reply = $request->input("ITTechnicianReply");

        $ticket->update($data);
        $ticket->AdminStatus = "released";
        $comment = $request->input("ITTechnicianComments");

        $ticket->save();

        // Check if the ticket is rejected by Admin
        if ($ticket->TicketStatus === "rejected") {
            dispatch(
                new sendTicketRejectedbyICTNotification($ticket, $comment)
            );
            $this->logActivity(
                auth()->user(),
                $ticket,
                "Rejected by ICT",
                "Ticket rejected by ICT Technician"
            ); //Action Log
        } else {
            // Ticket is solved by Admin
            $comment = $request->filled("ITTechnicianComments")
                ? $request->input("ITTechnicianComments")
                : $request->input("ITTechnicianReply");
            dispatch(new SendTicketSolvedNotification($ticket, $comment));
            $this->logActivity(
                auth()->user(),
                $ticket,
                "Solved",
                "Ticket Solved by ICT Technician"
            ); //Action Log
        }
        $message = "Ticket Solved Successfully";
        return redirect()
            ->route("admin.index")
            ->with("success", $message);
    }
}
