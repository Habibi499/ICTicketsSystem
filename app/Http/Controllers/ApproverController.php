<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TechnicianCategory;
use App\Notifications\TicketApprovedNotification;
use App\Notifications\NewTicketSubmittedNotification;
use App\Notifications\TicketRejectedNotification;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Jobs\SendTicketApprovedorNotification; 
use App\Jobs\AssignTicketToAdmin;

class ApproverController extends Controller
{
    public function index(Request $request)
    {
        
        $user = auth()->user(); // Get the logged-in user
        
        if($user->role_id==2 )
        {
                            $user = auth()->user(); // Get the logged-in user
                            
                            $approvedTicketCount = Ticket::where('UserID', $user->id)
                                ->where('HodApprovalStatus', 'Approved')
                                ->count();
                        
                            $UnapprovedTicketCounts= Ticket::where('DepartmentID',$user->department_id)
                                                        ->where('HodApproverName',$user->id)
                                                        ->where('HodApprovalStatus','UnApproved')
                                                        ->count();
                                                        
                            /*$tickets = Ticket::where('DepartmentID',$user->department_id)
                                        ->where('HodApproverName',$user->id)
                                        ->where('HodApprovalStatus','UnApproved')
                                ->orderBy('id', 'desc')
                                ->paginate(10);
                            */

                            if (Auth::check()) {
                                // Get the currently authenticated user's department ID
                                $userDepartmentID = Auth::user()->department_id; // Replace 'department_id' with the actual column name in your users table
                                $loggedInUserId = Auth::id();
                            } else {
                                // Handle the case when no user is authenticated
                                $userDepartmentID = null;
                                $loggedInUserId = null;
                            }
                          
                                $query = $request->input('query'); // Input From Query
                                $tickets = DB::table('invoices')
                                ->select(DB::raw('IFNULL(ticket_No, "No Ticket") as ticket_No'), 
                                        DB::raw('MAX(id) as invoice_id'), 
                                        DB::raw('MAX(section_head1) as invoice_section_head1'),
                                        DB::raw('MAX(Correction_Type) as invoice_ticket_details'),
                                        DB::raw('MAX(HodApprovalStatus) as invoice_approval_status'),
                                        DB::raw('MAX(hiddenApproverName) as approver_name'),
                                        DB::raw('MAX(TicketStatus) as invoice_ticket_status'),
                                        DB::raw('MAX(AssignedtoName) as invoice_assigned_to'),
                                        DB::raw('MAX(created_at) as invoice_date_created'),
                                        DB::raw('MAX(Solvedby) as invoice_ticket_solvedby'),
                                        DB::raw('MAX(documents) as invoice_document_attached'),
                                        DB::raw('MAX(TicketCategory) as invoice_TicketCategory'),
                                        )
                                        ->where('invoices.departmentID', '=', $userDepartmentID) // Add this line to filter by department ID
                                        ->where('invoices.HodApprovalStatus', '=', 'Unapproved') // Add this line to filter by HoDApproval Status
                                        ->where('invoices.HodApproverName', '=', $loggedInUserId) // Add this line to filter by HoDApproverName
                                        ->whereNotIn('invoices.id', [17, 19, 21, 22, 23, 41, 42, 47, 48, 49, 55, 86, 87, 88])
                                        ->where(function ($q) use ($query) {
                                            $q->where('invoices.id', 'like', '%' . $query . '%')
                                                ->orWhere('invoices.section_head1', 'like', '%' . $query . '%')
                                                ->orWhere('invoices.claimNumber', 'like', '%' . $query . '%')
                                                ->orWhere('invoices.ticket_No', 'like', '%' . $query . '%');
                                        })
                                        ->groupBy('invoices.ticket_No');

                            
                             $systemRightsItems = DB::table('system_rights_requisition')
                                ->select(DB::raw('IFNULL(ticket_No, "No Ticket") as ticket_No'),
                                         DB::raw('MAX(id) as rights_id'), 
                                         DB::raw('MAX(Requester_Name) as ticket_section_head1'),
                                         DB::raw('MAX(Main_Class_Name) as rights_ticket_details'),
                                         DB::raw('MAX(HodApprovalStatus) as rights_approval_status'),
                                         DB::raw('MAX(HodApproverName) as rights_approver_name'),
                                         DB::raw('MAX(TicketStatus) as rights_ticket_status'),
                                         DB::raw('MAX(Assignedto) as rights_assigned_to'),
                                         DB::raw('MAX(created_at) as rights_date_created'),
                                         DB::raw('MAX(Solvedby)as rights_ticket_solvedby'),
                                         DB::raw('MAX(documents) as rights_document_attached'),
                                         DB::raw('MAX(TicketCategory) as rights_TicketCategory'),
                                        )
                                        ->where('system_rights_requisition.departmentID', '=', $userDepartmentID) // Add this line to filter by department ID
                                        ->where('system_rights_requisition.HodApprovalStatus', '=', 'Unapproved') // Add this line to filter by HoDApproval Status
                                        ->where('system_rights_requisition.HodApproverName', '=', $loggedInUserId) // Add this line to filter by HoDApproverName
                                        ->whereNotIn('system_rights_requisition.id', [17, 19, 21, 22, 23, 41, 42, 47, 48, 49, 55, 86, 87, 88])
                                        ->where(function ($q) use ($query) {
                                            $q->where('system_rights_requisition.id', 'like', '%' . $query . '%')
                                                ->orWhere('system_rights_requisition.ticket_No', 'like', '%' . $query . '%')
                                                ->orWhere('system_rights_requisition.Main_Class_Name', 'like', '%' . $query . '%');
                                        })
                                        ->groupBy('system_rights_requisition.ticket_No');
                                    
                            
                                $tickets  = $tickets ->union($systemRightsItems)
                                ->orderBy('ticket_No', 'desc') 
                                ->paginate(10);
                            
                            $totalRecords = $tickets ->total(); // Total Records From search
                            
                        
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
                            dispatch(new AssignTicketToAdmin($ticket));
                            if ($user instanceof \Illuminate\Database\Eloquent\Model) {
                                $user->last_assigned_admin_id = $nextAdminUser->id;
                                $user->save();
                                $this->logActivity(auth()->user(), $ticket, 'Approved', 'Ticket Approved');//Action Log
                            }
                            
                        } else {
                            dispatch(new SendTicketApprovedorNotification($ticket, 'rejected'));
                            $this->logActivity(auth()->user(), $ticket, 'Rejected', 'Ticket Rejected');//Action Log
                        }
                     
                        // Redirect back with a success message
                        $message = $isApproved ? 'Ticket Approved Successfully.' : 'Ticket Rejected Successfully.';
                        return redirect()->route('approver.index')->with('success', $message);
                    }
                
                    // Handle the case where the user doesn't have the appropriate role (if needed)
                    return redirect()->route('approver.index')->with('error', 'Access Denied.');
                }
                
    /*
    |-------------------------------------------------------------
    |ACTIVITY LOG
    |-------------------------------------------------------------
    */
    private function logActivity($user, $record, $action, $details = null)
    {
        ActivityLog::create([
            'user_id' => $user ? $user->id : null,
            'record_id' => $record->id,
            'action' => $action,
            'details' => $details,
        ]);
    }
    }


    