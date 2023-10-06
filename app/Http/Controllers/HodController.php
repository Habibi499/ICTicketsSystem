<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use App\Models\PasswordChange;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HodController extends Controller
{
   
    public function index(Request $request){
        //Get Logged in User   
        $user = auth()->user(); 
        
        //Count All UnApproved in My Department
        $UnapprovedTicketCounts= Ticket::where('DepartmentID',$user->department_id)
                                            ->where('HodApprovalStatus','UnApproved')
                                             ->count();
        //Count All My UnApproved as Approver
        $myunapprovedTicketCounts = Ticket::where('DepartmentID', $user->department_id)
                                            ->where('HodApprovalStatus', 'UnApproved')
                                            ->where('HodApproverName',$user->id)
                                            ->count();

        //Show All Where am Selected Approver
        $tickets = Ticket::where('DepartmentID',$user->department_id)
                                //->where('HodApproverName',$user->id)
                                ->where('HodApprovalStatus','UnApproved')
                                ->orderBy('id', 'desc')
                                ->paginate(20);

            $user = auth()->user();
            
            $departmentId = $user->department_id;
            $query = $request->input('query'); // Input From Query
                                
            //$filteredItems = Ticket::where('UserID', $user->id)
            $filteredItems = Ticket::where('Departmentid', $departmentId)
                ->where('HodApprovalStatus', 'UnApproved') 
                ->where(function ($q) use ($query) {
                    $q->where('id', 'like', '%' . $query . '%')
                        ->orWhere('section_head1', 'like', '%' . $query . '%')
                        ->orWhere('TicketStatus', 'like', '%' . $query . '%')
                        ->orWhere('Record_No', 'like', '%' . $query . '%');
                })
                ->orderBy('id', 'desc')
                ->paginate(10);
            
        
        $totalRecords = $filteredItems->total();// Total Records From search
        //Search Form Ends

    
        return view('Approver.Hod', compact('tickets','myunapprovedTicketCounts','filteredItems','totalRecords','UnapprovedTicketCounts'));
    }
    public function show($id){

        $ticket = Ticket::findOrFail($id);
      
        return view('Ticket.show',compact("ticket"));
    }
    public function allunapproved(Request $request){
        //Count All UnApproved in My Department
        $user = auth()->user(); 

            //Count All UnApproved in My Department
            $UnapprovedTicketCounts= Ticket::where('DepartmentID',$user->department_id)
            ->where('HodApprovalStatus','UnApproved')
             ->count();
            //Count All My UnApproved as Approver
            $myunapprovedTicketCounts = Ticket::where('DepartmentID', $user->department_id)
                        ->where('HodApprovalStatus', 'UnApproved')
                        ->where('HodApproverName',$user->id)
                        ->count();

            //Show All Where am Selected Approver
            $tickets = Ticket::where('DepartmentID',$user->department_id)
            ->where('HodApprovalStatus','UnApproved')
            ->orderBy('id', 'desc')
            ->paginate(20);
            //All UnApproved Tickets
            $UnapprovedTicketsinDepartment= Ticket::where('DepartmentID',$user->department_id)
                                    ->where('HodApprovalStatus','UnApproved')
                                    ->orderBy('id','desc');

                  //Search form By Entering the Data on Search Form
                  $user = auth()->user();
            
                  $departmentId = $user->department_id;
                  $query = $request->input('query'); // Input From Query
                                      
                  //$filteredItems = Ticket::where('UserID', $user->id)
                  $filteredItems = Ticket::where('Departmentid', $departmentId)
                      ->where('HodApprovalStatus', 'UnApproved') 
                      ->where(function ($q) use ($query) {
                          $q->where('id', 'like', '%' . $query . '%')
                              ->orWhere('section_head1', 'like', '%' . $query . '%')
                              ->orWhere('TicketStatus', 'like', '%' . $query . '%')
                              ->orWhere('Record_No', 'like', '%' . $query . '%');
                      })
                      ->orderBy('id', 'desc')
                      ->paginate(10);
                  
              
              $totalRecords = $filteredItems->total();// Total Records From search
              //Search Form Ends
      
        
        return view('Approver.DepartmentUnapproved',compact('tickets','myunapprovedTicketCounts','UnapprovedTicketCounts',
                    'filteredItems','totalRecords'
    ));
                                    
    }
}
