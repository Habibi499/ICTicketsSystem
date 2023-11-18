<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\TicketApprovedNotification;
use App\Notifications\TicketSolvedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendTicketSolvedNotification;
use App\Http\Controllers\AdminChartController;
class AdminController extends Controller


{
    protected $adminChartController;

    public function __construct(AdminChartController $adminChartController)
    {
        $this->adminChartController = $adminChartController;
    }
    public function index(){
        $user = auth()->user(); // Get the logged-in user
        if($user->role_id==3){

    

    $tickets = Ticket::where('TicketStatus','open')
            ->where('HodApprovalStatus','Approved')
            ->orderBy('id','desc')
             ->paginate(8);

    $ticketsCount = Ticket::count();
    $UsersCount = User::orderBy('id','desc')
                ->count();
    $approvedTicketCount = Ticket::where('HodApprovalStatus', 'Approved')
                        ->count();
    $UnapprovedTicketCounts = Ticket::where('HodApprovalStatus', 'Unapproved')
                                        ->count();
    $AssignedTicketCount= Ticket::with('Assignedto')
                        ->where('HodApprovalStatus','Approved')
                         ->whereNotNull('Solvedby')
                          ->count();

    $ClosedTicketCount= Ticket::where('HodApprovalStatus','Approved')
                        ->whereNotNull('Solvedby')
                        ->where('TicketStatus','closed')
                        ->count();    

    $OpenTicketCount= Ticket::where('HodApprovalStatus','Approved')
                    ->where('TicketStatus','open')
                    ->count(); 

    //Assigned to Logged in Admin
    $MyAssignedTickets = Ticket::where('HodApprovalStatus','Approved')
                        ->where('TicketStatus','open')
                        ->where('Assignedto',$user->id)
                        ->orderby('id','desc')
                        ->paginate(6);
    //Retrieve Admins
    $Admins = User::where('role_id',3)
                ->orderBy('LeaveStatus','desc')
                        ->get();
    
    $DepartmentAssignedTickets = Ticket::where('TicketStatus','open')
                                ->where('HodApprovalStatus','Approved')
                                ->whereNotIn('Assignedto', [$user->id])
                                ->orderBy('id','desc')
                                ->paginate(6);
    
    $successMessage = session('success');// Retrieve the success message from the session

    $adminStats = $this->adminChartController->generateChart();//BarChart
   
    $adminStats2 = $this->adminChartController->generateAdminStats(); //PieChart
    return view('Admin.index', compact('tickets', 'approvedTicketCount', 'UnapprovedTicketCounts',
    'AssignedTicketCount', 'ClosedTicketCount', 'UsersCount', 'ticketsCount', 'OpenTicketCount',
    'MyAssignedTickets', 'DepartmentAssignedTickets', 'successMessage', 'adminStats', 'adminStats2', 'adminStats',
    'Admins'
));
    
}

    else{
        abort(403);
    }


    }
    public function edit(Ticket $ticket)
    {
        $user = auth()->user(); // Get the logged-in user
        
        if($user->role_id==3){
       
        return view('Admin.edit',compact("ticket"));

        }
        else{
            return redirect()->route('Ticket.index');
        }

    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->all(); // Get all data from the request
        $ticket->update($data); 
        //dd($ticket);
       
        $comment = $request->input('ITTechnicianComments');
        $ticket->save();

        // Dispatch the notification
        //$user = $ticket->user; 
       // $comment = $ticket->technician_comment;
        //if ($ticket->createdByUser) {
        // Notify the user with the TicketSolvedNotification
           // $ticket->createdByUser->notify(new TicketSolvedNotification($ticket, $comment));
        //}
      
    dispatch(new SendTicketSolvedNotification($ticket, $comment));
    $message =  'Ticket Solved Successfully';
        return redirect()->route('admin.index')->with('success', $message);
    }


}
