<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TechnicianCategory;
use App\Notifications\TicketApprovedNotification;
use App\Notifications\NewTicketSubmittedNotification;
use App\Notifications\TicketRejectedNotification;

use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Jobs\SendTicketApprovedorNotification; 
use App\Jobs\AssignTicketToAdmin;

class ApproverController extends Controller
{
    public function index()
    {
        
        $user = auth()->user(); // Get the logged-in user
        
        if($user->role_id==2){
                            $user = auth()->user(); // Get the logged-in user
                            
                            $approvedTicketCount = Ticket::where('UserID', $user->id)
                                ->where('HodApprovalStatus', 'Approved')
                                ->count();
                        
                            $UnapprovedTicketCounts= Ticket::where('DepartmentID',$user->department_id)
                                                        ->where('HodApproverName',$user->id)
                                                        ->where('HodApprovalStatus','UnApproved')
                                                        ->count();
                                                        
                            $tickets = Ticket::where('DepartmentID',$user->department_id)
                                        ->where('HodApproverName',$user->id)
                                        ->where('HodApprovalStatus','UnApproved')
                                ->orderBy('id', 'desc')
                                ->paginate(10);
                            
                        
                            return view('Approver.index', compact('tickets','approvedTicketCount','UnapprovedTicketCounts'));
                    }
                    else{
                        abort(403);
                    }
                }

            
                public function edit(Ticket $ticket)
                {
                
                    return view('approver.edit',compact("ticket"));
                }



                public function update(Request $request, Ticket $ticket)
                {
                    $user = auth()->user();
                    $nextAdminUser = null; // Declare the variable here
                
                    if ($user && $user instanceof User && $user->role_id == 2) {
                        // Update Ticket With new Data
                        $data = $request->all();
                        $rejectReason = $request->input('rejectReason');
                        $data['rejectReason'] = $rejectReason;
                        $ticket->update($data);
                
                        // Check if the status is changing to 'approved'
                        $isApproved = $request->input('HodApprovalStatus') == 1;
                
                        if ($isApproved) {
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
                          
                            // Dispatch the jobs with the next admin user
                            dispatch(new SendTicketApprovedorNotification($ticket, 'approved'));
                            dispatch(new AssignTicketToAdmin($ticket, $adminUsers));
                            if ($user instanceof \Illuminate\Database\Eloquent\Model) {
                                $user->last_assigned_admin_id = $nextAdminUser->id;
                                $user->save();
                            }
                          
                        } else {
                            dispatch(new SendTicketApprovedorNotification($ticket, 'rejected'));
                        }
                
                        // Redirect back with a success message
                        $message = $isApproved ? 'Ticket Approved Successfully.' : 'Ticket Rejected Successfully.';
                        return redirect()->route('approver.index')->with('success', $message);
                    }
                
                    // Handle the case where the user doesn't have the appropriate role (if needed)
                    return redirect()->route('approver.index')->with('error', 'Access Denied.');
                }
                

    }


    