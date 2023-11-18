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
use App\Jobs\ReleaseLockedTickets;
use Illuminate\Http\Request;
use App\Jobs\SendTicketSolvedNotification;
use App\Jobs\SendTicketEscalated;
use App\Jobs\sendTicketRejectedbyICTNotification;
use App\Http\Controllers\AdminChartController;
class AdminController extends Controller
{
    protected $adminChartController;

    public function __construct(AdminChartController $adminChartController)
    {
        $this->adminChartController = $adminChartController;
    }
    public function index()
    {
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

            //Assigned to Logged in Admin
            $MyAssignedTickets = Ticket::where("HodApprovalStatus", "Approved")
                ->where("TicketStatus", "open")
                ->where("Assignedto", $user->id)
                ->orderby("id", "desc")
                ->paginate(6);

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

            $DepartmentAssignedTickets = Ticket::where("TicketStatus", "open")
                ->where("HodApprovalStatus", "Approved")
                ->whereNotIn("Assignedto", [$user->id])
                ->orderBy("id", "desc")
                ->paginate(6);

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
                    "MyAssignedTickets",
                    "DepartmentAssignedTickets",
                    "TicketsRejectedByICT",
                    "successMessage",
                    "adminStats",
                    "adminStats2",
                    "adminStats3",
                    "adminStats",
                    "Admins"
                )
            );
        } else {
            abort(403);
        }
    }
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
                }
            });
            return view("Admin.edit", compact("ticket", "Admins"));
            // return view("Admin.edit", compact("ticket"));
        } else {
            return redirect()->route("admin.index");
        }
    }

    //Manual Ticket Relaease
    public function release(Ticket $ticket)
    {
        $ticket->worker_id = null;
        $ticket->AdminStatus = "released";
        $ticket->save();
        return redirect()
            ->route("admin.index")
            ->with("success", "Ticket released successfully.");
    }
    //Auto Release
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
            return redirect()
                ->route("admin.index")
                ->with("success", "Ticket escalated successfully.");
        }
    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->all(); 
        $ticket->update($data);
        $comment = $request->input("ITTechnicianComments");
        $ticket->save();
        // Check if the ticket is rejected by Admib
        if ($ticket->TicketStatus === "rejected") {
            dispatch(
                new sendTicketRejectedbyICTNotification($ticket, $comment)
            );
        } else {
            // Ticket is solved by Admin
            $comment = $request->input("ITTechnicianComments");
            dispatch(new SendTicketSolvedNotification($ticket, $comment));
        }
        $message = "Ticket Solved Successfully";
        return redirect()
            ->route("admin.index")
            ->with("success", $message);
    }
}
