<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
Use App\Models\User;

class UnApprovedTicketsController extends Controller
{
   
    public function index(Request $request){
                 
        $user = auth()->user(); // Get the logged-in user
        
        //Counters 
        $TicketCount = Ticket::where('UserID', $user->id)
                    ->count();
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
        //Fetch Approved Tickets for Logged on user
        $Totalticketscount= Ticket::where('UserID', $user->id)
                                    ->count();
      
    
                    
         $passwordChangeRecords = 0;


                //Search form By Entering the Data on Search Form
        $user = auth()->user(); 
        $query = $request->input('query');//Input From Query        
        $filteredItems = Ticket::where('UserID', $user->id)
        ->where('HodApprovalStatus','Unapproved')
            ->where(function ($q) use ($query) {
                $q->where('id', 'like', '%' . $query . '%')
                    ->orWhere('section_head1', 'like', '%' . $query . '%')
                    ->orWhere('HodApprovalStatus', 'like', '%' . $query . '%')
                    ->orWhere('TicketStatus', 'like', '%' . $query . '%')
                    ->orWhere('Record_No', 'like', '%' . $query . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10); 
            $totalRecords = $filteredItems->total();// Total Records From search
        return view('Ticket.myunapprovedtickets', compact('approvedTicketCount','UnapprovedTicketCount',
                                                'Totalticketscount','TicketCount','AssignedTicketCount', 'filteredItems','totalRecords'));
}
 
}