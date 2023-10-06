<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class TicketSearchController extends Controller
{
    public function search(Request $request)
    {
        $user = auth()->user(); // Get the logged-in user
        $query = Ticket::query();
    
        // Handle checkboxes for "approved" and "unapproved" options
        if ($request->has('approved')) {
            $query->where('HodApprovalStatus', 'Approved');
        }
    
        if ($request->has('unapproved')) {
            $query->where('HodApprovalStatus', 'Unapproved');
        }
    
        // Handle radio buttons for "TicketStatus" options
        $ticketStatuses = $request->input('TicketStatus');
        if (!empty($ticketStatuses)) {
            $query->whereIn('TicketStatus', $ticketStatuses);
        }
    
        // Fetch the filtered data
        $filteredItems = $query->paginate(10);
    
        // Total Records From search
        $totalRecords = $filteredItems->total();
    
           
        $approvedTicketCount = Ticket::where('UserID', $user->id)
             ->where('HodApprovalStatus', 'Approved')
             ->count();
       
         $UnapprovedTicketCount= Ticket::where('UserID',$user->id)
                     ->where('HodApprovalStatus','UnApproved')
                     ->count();
        $tickets = Ticket::where('UserID', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
    
        return view('Ticket.search', compact('filteredItems','tickets','approvedTicketCount','UnapprovedTicketCount'));
    }
    

}

