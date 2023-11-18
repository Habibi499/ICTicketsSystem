<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Http\Controllers\AdminChartController;
use Illuminate\Http\Request;

class AdminStatisticsController extends Controller

{
    protected $adminChartController;

    public function __construct(AdminChartController $adminChartController)
    {
        $this->adminChartController = $adminChartController;
    }
    public function index(){
        $user = auth()->user(); // Get the logged-in user
        
    if($user->role_id==3 || $user->role_id==3){
    $tickets = Ticket::where('TicketStatus','open')
            ->orderBy('id','desc')
             ->paginate(6);
    $ticketsCount = Ticket::count();
    $UsersCount = User::orderBy('id','desc')
                ->count();
    $approvedTicketCount = Ticket::where('HodApprovalStatus', 'approved')
                        ->count();
    $UnapprovedTicketCounts = Ticket::where('HodApprovalStatus', 'Unapproved')
                            ->count();
    $RejectedTicketCounts = Ticket::where('HodApprovalStatus', 'rejected')
                            ->count();
    $AssignedTicketCount= Ticket::with('Assignedto')
                        ->where('HodApprovalStatus','approved')
                         ->whereNotNull('Solvedby')
                          ->count();

    $ClosedTicketCount= Ticket::where('HodApprovalStatus','approved')
                        ->whereNotNull('Solvedby')
                        ->where('TicketStatus','closed')
                        ->count();   
    $PendingTicketCount= Ticket::where('HodApprovalStatus','approved')
                                    ->whereNotNull('Solvedby')
                                    ->where('TicketStatus','Pending')
                                    ->count();  

    $TicketsRejectedByICT = Ticket::where ('HodApprovalStatus','approved')
                                    ->whereNotNull('Solvedby')
                                    ->where('TicketStatus','rejected')  
                                    ->count();                  

    $OpenTicketCount= Ticket::where('HodApprovalStatus','approved')
                    ->where('TicketStatus','open')
                    ->where('Solvedby','')
                     ->count();   
    
    $adminStats3=$this->adminChartController->GenerateITDepartmentStats();
    $barGraphData = $this->adminChartController->GenerateTicketsByCategory();
    $adminStats = $this->adminChartController->generateChart(); //BarChart
     return view('Admin.statistics',compact('tickets','approvedTicketCount','UnapprovedTicketCounts',
             'AssignedTicketCount','ClosedTicketCount','UsersCount','ticketsCount','OpenTicketCount',
             'RejectedTicketCounts','PendingTicketCount','adminStats3','adminStats','barGraphData',
             'TicketsRejectedByICT',
            ));

    }

    else{
        abort(403);
    }


    }
}
