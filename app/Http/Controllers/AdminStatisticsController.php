<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class AdminStatisticsController extends Controller
{
    public function index(){
        $user = auth()->user(); // Get the logged-in user
        
        if($user->role_id==3){
    $tickets = Ticket::where('TicketStatus','open')
            ->orderBy('id','desc')
             ->paginate(6);
    $ticketsCount = Ticket::count();
    $UsersCount = User::orderBy('id','desc')
                ->count();
    $approvedTicketCount = Ticket::where('HodApprovalStatus', 'Approved')
                        ->count();
    $UnapprovedTicketCounts = Ticket::where('HodApprovalStatus', 'Unapproved')
                            ->count();
    $RejectedTicketCounts = Ticket::where('HodApprovalStatus', 'rejected')
                            ->count();
    $AssignedTicketCount= Ticket::with('Assignedto')
                        ->where('HodApprovalStatus','Approved')
                         ->whereNotNull('Solvedby')
                          ->count();

    $ClosedTicketCount= Ticket::where('HodApprovalStatus','Approved')
                        ->whereNotNull('Solvedby')
                        ->where('TicketStatus','closed')
                        ->count();   
    $PendingTicketCount= Ticket::where('HodApprovalStatus','Approved')
                                    ->whereNotNull('Solvedby')
                                    ->where('TicketStatus','Pending')
                                    ->count();                      

    $OpenTicketCount= Ticket::where('HodApprovalStatus','Approved')
                    ->where('TicketStatus','open')
                     ->count();    

     return view('Admin.statistics',compact('tickets','approvedTicketCount','UnapprovedTicketCounts',
             'AssignedTicketCount','ClosedTicketCount','UsersCount','ticketsCount','OpenTicketCount',
             'RejectedTicketCounts','PendingTicketCount'
            ));

   
    }

    else{
        abort(403);
    }


    }
}
