<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\TicketApprovedNotification;
use App\Notifications\TicketSolvedNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewTicketSubmittedNotification;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
class TechnicianController extends Controller
{
   
    public function index(){
        $user = auth()->user(); // Get the logged-in user
        
        //if($user->role_id==4){
    $tickets = Ticket::where('HodApprovalStatus', 'Approved')
            ->where('TicketStatus','open')
            ->orderBy('id','desc')
             ->paginate(6);
    $ticketsCount = Ticket::count();
    $UsersCount = User::orderBy('id','desc')
                ->count();
    $approvedTicketCount = Ticket::where('HodApprovalStatus', 'Approved')
                        ->count();
    $UnapprovedTicketCounts = Ticket::where('HodApprovalStatus', 'Unapproved')
    ->count();
    $AssignedTicketCount= Ticket::where('HodApprovalStatus','Approved')
                         ->whereNotNull('Assignedto')
                          ->count();

    $ClosedTicketCount= Ticket::where('HodApprovalStatus','Approved')
                        ->whereNotNull('Assignedto')
                        ->where('TicketStatus','closed')
                        ->count();                      


     return view('Technician.index',compact('tickets','approvedTicketCount','UnapprovedTicketCounts',
             'AssignedTicketCount','ClosedTicketCount','UsersCount','ticketsCount'));

   
    //}

    //else{
       // abort(403);
    //}


    }

    public function show($id){

        $ticket = Ticket::findOrFail($id);
      // $this->authorize('view', $ticket); // Check authorization
        return view('Technician.show',compact("ticket"));
    }

    public function edit(Ticket $ticket)
    {
        $user = auth()->user(); // Get the logged-in user
        
        //if($user->role_id==4){
       
        return view('Technician.edit',compact("ticket"));

        //}
        //else{
            return redirect()->route('Ticket.index');
       // }

    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->all(); // Get all data from the request
        $ticket->update($data); 
      // Notify the admin
    $admin = User::where('role_id', 4)->first();
    if ($admin) {
        $admin->notify(new NewTicketSubmittedNotification($ticket));
    }

     
        return redirect()->route('technician.index')->with('success', 'Invoice updated successfully.');
    }
 
}
