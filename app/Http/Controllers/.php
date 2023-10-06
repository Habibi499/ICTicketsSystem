<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\TicketApprovedNotification;
use App\Notifications\NewTicketSubmittedNotification;
use App\Notifications\TicketRejectedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class HeadofdepartmentController extends Controller
{
    public function index()
    {
        
        $user = auth()->user(); // Get the logged-in user
        
        if($user->role_id==2){
                $user = auth()->user(); // Get the logged-in user
                
                $approvedTicketCount = Ticket::where('UserID', $user->id)
                     ->where('HodApprovalStatus', 'Approved')
                     ->count();
               
                 $UnapprovedTicketCounts= Ticket::where('DepartmentID',$user->department_id)
                             ->where('HodApprovalStatus','UnApproved')
                             ->count();
                $tickets = Ticket::where('DepartmentID',$user->department_id)
                            ->where('HodApprovalStatus','UnApproved')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
                 
            
                return view('Approver.index', compact('tickets','approvedTicketCount','UnapprovedTicketCounts'));
        }
        else{
            abort(403);
        }
    }
  
    public function edit(Ticket $ticket)
    {
       
        return view('approver.edit',compact("ticket"));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->all();
        $ticket->update($data); // Update the invoice with the new data
        if ($request->input('HodApprovalStatus') == 1) {
            $ticket->HodApprovalStatus = 'approved';
            $ticket->save();
            
                 $RequesterEmail = $ticket->createdByUser->email;
                
                 $Requester = User::where('email', $RequesterEmail)->first();
      
                 if ($Requester) {
                     Notification::send($Requester, new TicketApprovedNotification($ticket));   
                    }
                 // Assuming $ticket and $admin are defined
    // Notify the admin
    $admin = User::where('role_id', 3)->first();
    if ($admin) {
        $admin->notify(new NewTicketSubmittedNotification($ticket));
    }



         
        } else {
            $ticket->HodApprovalStatus = 'rejected';
                $RequesterEmail = $ticket->createdByUser->email;
                $Requester = User::where('email', $RequesterEmail)->first();
                Notification::send($Requester, new TicketRejectedNotification($ticket));
        }
     
        return redirect()->route('approver.index')->with('success', 'Invoice updated successfully.');
    }
}
