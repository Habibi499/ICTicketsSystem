<?php

namespace App\Http\Controllers;
use App\Jobs\SendNewTicketNotification; 
use App\Jobs\SendNewTicketApprovalNotification; 
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewTicketNotification;
use App\Notifications\NewPasswordChangeApprovalNotification;

use App\Http\Requests\FormValidationRequest;

class TicketController extends Controller
{
    public function index(Request $request){
             
       $user = auth()->user(); // Get the logged-in user
       
       $approvedTicketCount = Ticket::where('UserID', $user->id)
            ->where('HodApprovalStatus', 'Approved')
            ->count();
      
        $UnapprovedTicketCount= Ticket::where('UserID',$user->id)
                    ->where('HodApprovalStatus','UnApproved')
                    ->count();
        $AssignedTicketCount= Ticket::where('UserID',$user->id)
                             ->where('HodApprovalStatus','Approved')
                             ->whereNotNull('Assignedto')
                              ->count();
       $tickets = Ticket::where('UserID', $user->id)
           ->orderBy('id', 'desc')
           ->paginate(10);
        
       return view('Ticket.index', compact('tickets','approvedTicketCount','UnapprovedTicketCount','AssignedTicketCount'));
   }
    


    public function create()
    {
        $user = auth()->user(); 
        $departmentName = $user->department ? $user->department->name : 'Unknown Department';
        $headOfDepartment = $user->department && $user->department->head ? $user->department->head->name : 'Unknown Head';
        $approvers=User::where('role_id',2)
                    ->where('department_id',$user->department_id)
                    ->get();
    
        return view('Ticket.create',compact('approvers','departmentName', 'headOfDepartment'));
    }

    public function store(FormValidationRequest $request)
    {
        $user = auth()->user(); // Get the authenticated user
   
         // Validation passed, you can proceed with processing the data
    $validatedData = $request->validated();

  
        $file = $request->file('documents');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        $chosenApproverUserId = $request->input('HodApproverName');


        $ticket = Ticket::create([
            'section_head1' => $request->input('section_head1'),
            'DepartmentID'=>$user->department_id,
            'Section_Head' => $request->input('Section_Head'),
            'TicketCategory'=>1,
            'correction_category'=>$request->input('CorrectionCategory'),
            'correction_sub_category'=>$request->input('CorrectionTypeSub'),
            'Correction_Type'=> $request->input('Correction_Type'),
            'EndorsementNo'=>$request->input('EndorsementNo'),
            'RenewalNo'=>$request->input('RenewalNo'),
            'pvNumber'=>$request->input('pvNumber'),
            'claimNumber'=>$request->input('claimNumber'),
            'Record_No'=>$request->input('Record_No'),
            
            'TicketStatus' => 'Open',
            'Ticket_Urgency' => $request->input('Ticket_Urgency'),
            'Correction_Details'=> $request->input('Correction_Details'),
            'HodApproverName'=> $chosenApproverUserId,
            'HodApprovalStatus' => 'UnApproved',
           
            'UserID'=> $user->id,
            'documents' => $fileName, // Save the filename in the database
            
        ]);
        
    
          
           $user = auth()->user();

        SendNewTicketNotification::dispatch($ticket, $user);
          // Find the user who is the approver within the same department and has role_id 2
          //$approvers = User::where('department_id', $user->department_id)
          //->where('role_id', 2)
          //->get();
      
        // foreach ($approvers as $approver) {
          //SendNewTicketApprovalNotification::dispatch($ticket, $user, $approver);
        //}

         // Fetch the chosen approver using their user ID and send the notification
        $chosenApprover = User::find($chosenApproverUserId);
    
    if ($chosenApprover) {
        SendNewTicketApprovalNotification::dispatch($ticket, $user, $chosenApprover);
    }

           return redirect()->route('requestedtickets.index');
        }
}
