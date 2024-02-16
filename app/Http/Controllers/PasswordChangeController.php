<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\TicketController;
use App\Notifications\NewPasswordChangeRequestNotification;
use App\Notifications\NewTicketSubmittedNotification;
use App\Http\Requests\PasswordChangeValidationRequest;
use App\Traits\TicketNumberTrait;
use App\Models\TicketNumbers;
use App\Jobs\SendTicketApprovedorNotification; 
use App\Jobs\AssignTicketToAdmin;
class PasswordChangeController extends Controller
{
    use TicketNumberTrait;
    public function index(){

        $user = auth()->user();
        $departmentName = $user->department ? $user->department->name : 'Unknown Department';
        $headOfDepartment = $user->department && $user->department->head ? $user->department->head->name : 'Unknown Head';
    
    
       // return view('Ticket.create', compact('departmentName', 'headOfDepartment'));
        return view('Ticket.passwordchange',compact('departmentName', 'headOfDepartment'));
        
    }

    public function store(PasswordChangeValidationRequest $request)
    {
        $user = auth()->user(); // Get the authenticated user
        $nextAdminUser = null; // Declare the variable here
        // Validation passed, you can proceed with processing the data
        $validatedData = $request->validated();
                              // Get the next admin user before dispatching jobs
                              $adminUsers = User::where('role_id', 3)->get();
                
                              // Check if there are admin users available
                              if ($adminUsers->isEmpty()) {
                                  return redirect()->route('approver.index')->with('error', 'No admin users available.');
                              }
                  
                              $lastAssignedAdminId = $user->last_assigned_admin_id;
                              //dd($lastAssignedAdminId);
                              // Your Round Robin logic to find the next admin user goes here
                              foreach ($adminUsers as $adminUser) {
                                  if (!$lastAssignedAdminId || $adminUser->id > $lastAssignedAdminId) {
                                      $nextAdminUser = $adminUser;
                                      break;
                                  }
                              }
                              if (!$nextAdminUser) {
                                  $nextAdminUser = $adminUsers->first();
                              }
                            
                    // Generate a unique ticket number
                    $ticketData = $this->generateTicketNumber();
                    $ticketNumber=$ticketData['ticketNumber'];
                    // Create a new instance of TicketNumbers for the ticket
                    $ticket = TicketNumbers::create([
                        'ticket_category' => 'System Rights Request',  
                        'ticket_code' => $ticketData['ticketCode'],
                        'ticket_No' => $ticketData['ticketNumber'],
                    ]);

                                  // Create a new Ticket record with the provided data
            $pass = Ticket::create([
    
                'section_head1' => $request->input('Section_Head1'),
                'Section_Head' => $request->input('Section_Head'),
                'TicketStatus' => 'Open',
                'ticket_No'=>$ticketNumber,
              
                'SystemName'=>$request->input('SystemName'),
                'Correction_Type' => 'Password-Change',
                'Correction_Details' => 'Requester UserName' . $request->input('UserName'),
                'Record_No' => 'Password Change',
                'HodApprovalStatus' => 'Approved',
                'HodApproverName'=>'6',
                'Ticket_Urgency' => 'Medium',
                'DepartmentID' => $user->department_id,
                'UserID' => $user->id,
                'TicketCategory' => $request->input('TicketCategory'),
            ]);

            
                              // Dispatch the jobs with the next admin user
                
            dispatch(new AssignTicketToAdmin($pass));
            if ($user instanceof \Illuminate\Database\Eloquent\Model) {
                $user->last_assigned_admin_id = $nextAdminUser->id;
                $user->save();
            }

    
        // Redirect to the appropriate route
        $user = auth()->user(); 
        $tickets = Ticket::where('UserID', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return redirect()->route('requestedtickets.index');
    }
    
}

