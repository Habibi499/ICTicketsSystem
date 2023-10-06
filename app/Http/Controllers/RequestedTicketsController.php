<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use App\Models\PasswordChange;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RequestedTicketsController extends Controller
{
   
    public function index(Request $request){
             
        $user = auth()->user(); //Logged-in user
        $passwordChangeRecords = null;

        //Approved Tickets
        $approvedTicketCount = Ticket::where('UserID', $user->id)
                              ->where('HodApprovalStatus', 'Approved')
                                ->count();
        //Assigned Tickets 
        $AssignedTicketCount= Ticket::where('UserID',$user->id)
                                ->where('HodApprovalStatus','Approved')
                                ->whereNotNull('Assignedto')
                                ->count();
        //UnApproved Tickets
         $UnapprovedTicketCount= Ticket::where('UserID',$user->id)
                                        ->where('HodApprovalStatus','UnApproved')
                                        ->count();
        //Total Tickets Count
        $tickets = Ticket::where('UserID', $user->id)
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        
        //Search form By Entering the Data on Search Form
        $user = auth()->user(); 
        $query = $request->input('query');//Input From Query        
        $filteredItems = Ticket::where('UserID', $user->id)
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
        //Search Form Ends
         
        return view('Ticket.mytickets', compact('tickets','approvedTicketCount','UnapprovedTicketCount',
                    'AssignedTicketCount','filteredItems','totalRecords'));
    }
    
  
    //Search by Filtering Conditions
    public function search(Request $request)
    {
        $user = auth()->user(); //Logged in user
        $query = Ticket::query();

        // Handle checkboxes
        if ($request->has('approved')) {
            $query->where('HodApprovalStatus', 'Approved');
        }
    
        if ($request->has('unapproved')) {
            $query->where('HodApprovalStatus', 'Unapproved');
        }
    
        $ticketStatuses = $request->input('TicketStatus');
        if (!empty($ticketStatuses)) {
            $query->whereIn('TicketStatus', $ticketStatuses);
        }
        $filteredItems = $query->paginate(10);
        //Totals from Search
        $totalRecords = $filteredItems->total();
    
        //Tickets Counter at Top Panel 
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
    
        return view('Ticket.mytickets', compact('filteredItems','tickets','approvedTicketCount','UnapprovedTicketCount','totalRecords','AssignedTicketCount'));
    }
    

    
    public function show($id){

        $ticket = Ticket::findOrFail($id);
        return view('Ticket.show',compact("ticket"));
    }
}
