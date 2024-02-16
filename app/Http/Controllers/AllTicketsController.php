<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use App\Models\systemRights;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use PDF;
class AllTicketsController extends Controller
{
    public function index(Request $request){
        $currentTime = date("d-m-Y H:i:s");
        $user = auth()->user();
        
        $query = $request->input('query'); // Input From Query

        $filteredItems = Ticket::whereNotIn('id', [17,19,21,22,23,41,42,47, 48, 49,55,86,87,88])
            ->where(function ($q) use ($query) {
                $q->where('id', 'like', '%' . $query . '%')
                    ->orWhere('section_head1', 'like', '%' . $query . '%')
                    ->orWhere('HodApprovalStatus', 'like', '%' . $query . '%')
                    ->orWhere('TicketStatus', 'like', '%' . $query . '%')
                    ->orWhere('EndorsementNo', 'like', '%' . $query . '%')
                    ->orWhere('Record_No', 'like', '%' . $query . '%')
                    ->orWhere('RenewalNo', 'like', '%' . $query . '%')
                    ->orWhere('chequeNumber','like','%'.$query.'%')
                    ->orWhere('ReceiptNo','like','%'.$query.'%')
                    ->orWhere('DrCrNumber','like','%'.$query.'%')
                    ->orWhere('JVNumber', 'like', '%' . $query . '%')
                    ->orWhere('DemandNoteNo', 'like', '%' . $query . '%')
                    ->orWhere('PettyVoucherNum','like','%'.$query.'%')
                    ->orWhere('claimNumber','like','%'.$query.'%')
                    ->orWhere('ReferenceNumber','like','%'.$query.'%')
                    ;
            })
            ->orderBy('id', 'desc')
            ->take(300)
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

    public function AllRightsrequestshow(){
        //Rights 
         $user = auth()->user(); 
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


         $RightsTickets = systemRights::join(DB::raw('(SELECT MAX(id) as max_id, ticket_No 
         FROM system_rights_requisition
         GROUP BY ticket_No) as subquery'),
         function ($join) {
         $join->on('system_rights_requisition.id', '=', 'subquery.max_id');
         })
         ->where('system_rights_requisition.userID', '=', $user->id)
         ->select('system_rights_requisition.*')
         ->orderBy("subquery.max_id", "desc")
         ->paginate(10);

         return view('Admin.Rightstickets', compact('tickets','RightsTickets'));
    }
}


  
        