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

class PasswordChangeController extends Controller
{
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
    
        // Validation passed, you can proceed with processing the data
        $validatedData = $request->validated();
    
        // Get a list of admin users who can handle password change requests
        $adminUsers = User::where('role_id', 3)->get();

        
    
        // Find the last assigned admin user (you might need to store this in your database)
        // For now, let's assume you have a field called 'last_assigned_admin_id' in your users table
        $lastAssignedAdminId = $user->last_assigned_admin_id;
        
        // Use Round Robin algorithm to select the next admin user
        $nextAdminUser = null;
        foreach ($adminUsers as $adminUser) {
            if (!$lastAssignedAdminId || $adminUser->id > $lastAssignedAdminId) {
                $nextAdminUser = $adminUser;
                break;
            }
        }
       
        // If no admin user was found, assign the first one in the list
        if (!$nextAdminUser && count($adminUsers) > 0) {
            $nextAdminUser = $adminUsers->first();
        }
       
        if ($nextAdminUser) {
            // Create a new Ticket record with the provided data
            $pass = Ticket::create([
                'section_head1' => $request->input('Section_Head1'),
                'Section_Head' => $request->input('Section_Head'),
                'TicketStatus' => 'Open',
                'Assignedto' => $nextAdminUser->id, // Assign the ticket to the selected admin user
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
           
        
            if ($user instanceof \Illuminate\Database\Eloquent\Model) {
                $user->last_assigned_admin_id = $nextAdminUser->id;
                $user->save();
            }
            
            // Send notification to the user for the password change request
            Notification::send($user, new NewPasswordChangeRequestNotification($pass));
           // Fetch the email of the next admin user
            $adminEmail = $nextAdminUser->email;
       
            // Send notification to the user for the password change request
            Notification::send($nextAdminUser, new NewTicketSubmittedNotification($pass));
        }
    
        // Redirect to the appropriate route
        $user = auth()->user(); 
        $tickets = Ticket::where('UserID', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return redirect()->route('requestedtickets.index');
    }
    
}

