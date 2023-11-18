<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use PDF;

class AdminSearchController extends Controller
{
    public function index(Request $request){
             
        $user = auth()->user(); //Logged-in user
        $passwordChangeRecords = null;

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
        
    // Create a PDF view with the search results
    $pdf = PDF::loadView('pdf', ['filteredItems' => $filteredItems]);
             // Generate and return the PDF
    return $pdf->download('search-results.pdf');
        return $totalRecords;
    }
}
