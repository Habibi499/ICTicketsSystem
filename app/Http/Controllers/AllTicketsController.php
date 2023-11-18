<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use PDF;
class AllTicketsController extends Controller
{
    public function index(Request $request){
        $currentTime = date("d-m-Y H:i:s");
        $user = auth()->user();
        
        $query = $request->input('query'); // Input From Query

        $filteredItems = Ticket::whereNotIn('id', [17,19,21,22,23,41,42,47, 48, 49,55])
            ->where(function ($q) use ($query) {
                $q->where('id', 'like', '%' . $query . '%')
                    ->orWhere('section_head1', 'like', '%' . $query . '%')
                    ->orWhere('HodApprovalStatus', 'like', '%' . $query . '%')
                    ->orWhere('TicketStatus', 'like', '%' . $query . '%')
                    ->orWhere('EndorsementNo', 'like', '%' . $query . '%')
                    ->orWhere('Record_No', 'like', '%' . $query . '%')
                    ->orWhere('RenewalNo', 'like', '%' . $query . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        
        $totalRecords = $filteredItems->total(); // Total Records From search
        //Search Form Ends

            // Check if the user wants to download the search results as a PDF
    if ($request->has('downloadPDF')) {
        $pdf = PDF::loadView('Admin.exportToPdf', compact('filteredItems','user', 'currentTime'));

        return $pdf->download('search_results.pdf');
    }

    
        return view('Admin.tickets',compact('totalRecords','filteredItems'));
    }
    public function show($id){

        $ticket = Ticket::findOrFail($id);
      // $this->authorize('view', $ticket); // Check authorization
        return view('Admin.show',compact("ticket"));
    }
}


  
        