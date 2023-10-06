<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class AllTicketsController extends Controller
{
    public function index(Request $request){
     
        $query = $request->input('query');//Input From Query        
        $filteredItems = Ticket::where('TicketStatus','Open')
                        ->where('HodApprovalStatus','Approved')
            ->where(function ($q) use ($query) {
                $q->where('id', 'like', '%' . $query . '%')
                    ->orWhere('section_head1', 'like', '%' . $query . '%')
                    ->orWhere('HodApprovalStatus', 'like', '%' . $query . '%')
                    ->orWhere('TicketStatus', 'like', '%' . $query . '%')
                    ->orWhere('EndorsementNo', 'like', '%' . $query . '%')
                    ->orWhere('RenewalNo', 'like', '%' . $query . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10); 
        
        $totalRecords = $filteredItems->total();// Total Records From search
        //Search Form Ends
        return view('Admin.tickets',compact('totalRecords','filteredItems'));
    }
    public function show($id){

        $ticket = Ticket::findOrFail($id);
      // $this->authorize('view', $ticket); // Check authorization
        return view('Admin.show',compact("ticket"));
    }
}


  
        