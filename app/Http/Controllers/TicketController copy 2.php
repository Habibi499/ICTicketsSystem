<?php

namespace App\Http\Controllers;
use App\Jobs\SendNewTicketNotification;
use App\Jobs\SendNewTicketApprovalNotification;
use App\Jobs\ReopenTicketJob ;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewTicketNotification;
use App\Notifications\NewPasswordChangeApprovalNotification;
use App\Http\Controllers\myticketstatsbarController;
use App\Http\Requests\FormValidationRequest;


class TicketController extends Controller
{
    protected $myticketstatsbarController;

    public function __construct(
        myticketstatsbarController $myticketstatsbarController
    ) {
        $this->myticketstatsbarController = $myticketstatsbarController;
    }

    public function index(Request $request)
    {
        $user = auth()->user(); // Get the logged-in user

        $approvedTicketCount = Ticket::where("UserID", $user->id)
            ->where("HodApprovalStatus", "Approved")
            ->count();

        $UnapprovedTicketCount = Ticket::where("UserID", $user->id)
            ->where("HodApprovalStatus", "UnApproved")
            ->count();
        $AssignedTicketCount = Ticket::where("UserID", $user->id)
            ->where("HodApprovalStatus", "Approved")
            ->whereNotNull("Assignedto")
            ->count();

        $RejectedTicketBySupervisor = Ticket::where("UserID", $user->id)
            ->where("HodApprovalStatus", "rejected")
            ->count();
        $solvedTicketsbyICT = Ticket::where("UserID", $user->id)
            ->where("HodApprovalStatus", "rejected")
            ->whereNotNull("Assignedto")
            ->whereNotNull("Solvedby")
            ->count();

        $tickets = Ticket::where("UserID", $user->id)
            ->orderBy("id", "desc")
            ->paginate(10);

        $adminStats2 = $this->myticketstatsbarController->generateAdminStats(); //PieChart
        return view(
            "Ticket.index",
            compact(
                "tickets",
                "approvedTicketCount",
                "UnapprovedTicketCount",
                "AssignedTicketCount",
                "RejectedTicketBySupervisor",
                "solvedTicketsbyICT",
                "adminStats2"
            )
        );
    }

    public function create()
    {
        $user = auth()->user();
        $departmentName = $user->department
            ? $user->department->name
            : "Unknown Department";
        $headOfDepartment =
            $user->department && $user->department->head
                ? $user->department->head->name
                : "Unknown Head";
        $approvers = User::where(function ($query) use ($user) {
            $query->where("role_id", 2)
                ->where("department_id", $user->department_id);
        })
        ->orWhere(function ($query) {
            $query->where("role_id", 2)
                ->where("department_id", 6);
        })
        ->get();
            
        

        return view(
            "Ticket.create",
            compact("approvers", "departmentName", "headOfDepartment")
        );
    }

    public function store(FormValidationRequest $request)
    {

        
        $user = auth()->user(); // Get the authenticated user

        // Validation passed, you can proceed with processing the data
        $validatedData = $request->validated();
        // Assuming your form has <input type="file" name="documents[]" multiple>
        $files = $request->file("documents");
        if (count($files) > 3) {
            $errorMessage = 'You can only attach up to 3 documents.'; 
            return view('Ticket.create', compact('errorMessage'));
        }
        // Loop through each file and save it
        $fileNames = [];
        foreach ($files as $file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("uploads"), $fileName);
            $fileNames[] = $fileName;
        }

        $chosenApproverUserId = $request->input("HodApproverName");
        

        $ticket = Ticket::create([
            "section_head1" => $request->input("section_head1"),
            "DepartmentID" => $user->department_id,
            "Correction_Dept" => $request->input("Correction_Dept"),
            "Section_Head" => $request->input("Section_Head"),
            "TicketCategory" => "Correction-Form",
            "correction_category" => $request->input("CorrectionCategory"),
            "correction_sub_category" => $request->input("CorrectionTypeSub"),
            "Correction_Type" => $request->input("Correction_Type"),
            "EndorsementNo" => $request->input("EndorsementNo"),
            "Endorsement_Code" => $request->input("Endorsement_Code"),

            "RenewalNo" => $request->input("RenewalNo"),
            "Policy_code" => $request->input("Policy_code"),
            "pvNumber" => $request->input("pvNumber"),
            "correction_sub_category" => $request->input("correction_sub_category" ),
            "Payment-Mode" => $request->input("Payment-Mode"),
            "pvNumber" => $request->input("pvNumber"),
            "chequeNumber" => $request->input("chequeNumber"),
            "ReferenceNumber" => $request->input("ReferenceNumber"),
            "paymentVoucher" => $request->input("paymentVoucherr"),
            "DrCrNumber" => $request->input("DrCrNumber"),
            "PettyCashVoucherNum" => $request->input("PettyCashVoucherNum"),
            "ReversalNo" => $request->input("ReversalNo"),
            "DrCrNumber" => $request->input("DrCrNumber"),
            "PettyCashVoucherNum" => $request->input("PettyCashVoucherNum"),
            "ReversalNo" => $request->input("ReversalNo"),
            "ReceiptNo" => $request->input("ReceiptNo"),
            "claimNumber" => $request->input("claimNumber"),
            "Record_No" => $request->input("Record_No"),
            "TicketStatus" => "Open",
            "Ticket_Urgency" => $request->input("Ticket_Urgency"),
            "Correction_Details" => $request->input("Correction_Details"),
            "HodApproverName" => $chosenApproverUserId,
            "HodApprovalStatus" => "UnApproved",

            "UserID" => $user->id,
           // "documents" => $fileName, // Save the filename in the database
            "documents" => implode(',', $fileNames),
        ]);
      
        $user = auth()->user();

        SendNewTicketNotification::dispatch($ticket, $user);
        // Find the user who is the approver within the same department and has role_id 2
        //$approvers = User::where('department_id', $user->department_id)
        //->where('role_id', 2)
        //->get();if ($ticket->TicketStatus == 'pending' || $ticket->TicketStatus ==
        // 'rejected' || $ticket->TicketStatus == 'open') {

        // foreach ($approvers as $approver) {
        //SendNewTicketApprovalNotification::dispatch($ticket, $user, $approver);
        //}

        // Fetch the chosen approver using their user ID and send the notification
        $chosenApprover = User::find($chosenApproverUserId);

        if ($chosenApprover) {
            SendNewTicketApprovalNotification::dispatch(
                $ticket,
                $user,
                $chosenApprover
            );
        }

        return redirect()->route("requestedtickets.index");
    }

    public function edit(Ticket $ticket)
    {
        $user = auth()->user();
          
         $adminName = $ticket->Solvedby; //Unique Name
          $admin = User::where('name', $adminName)->first();

          // Get the admin ID
          $admin = User::where('name', $adminName)->first();
          $adminID = $admin ? $admin->id : null;

        return view("Ticket.edit", compact("ticket","adminID"));
        
    }

    public function update(Request $request, Ticket $ticket)
    
    {
        $user = auth()->user();
        $request->validate([
           
        ]);
    
        $data = $request->except('document'); // Exclude the 'document' field from $data
        $ticket->update($data);
    
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $filename = time() . '_' . $document->getClientOriginalName();
            $document->storeAs('uploads', $filename, 'public');
            $ticket->update(['NewAdditionaldocument' => $filename]);
        }
    
        // Update other fields
        $ReopeningComments = $request->input("ReopeningComments");
        $Reopened = $request->input("ReopeningComments");;
        $ticket->save();
        ReopenTicketJob ::dispatch($ticket,$user);

       return redirect()->route('requestedtickets.index');

    }
}
