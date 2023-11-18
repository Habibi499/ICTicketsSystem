<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
class myticketstatsbarController extends Controller
{
    public function generateAdminStats()
    {
          $user = auth()->user(); 
        // Retrieve ticket statistics for pie chart
        $approvedCount = Ticket::where('HodApprovalStatus', 'Approved')
                                ->where('userID',$user->id)->count();
        $solvedCount = Ticket::where('HodApprovalStatus', 'Approved')->where('TicketStatus', 'closed')
                                 ->where('userID',$user->id)->count();
        $unsolvedCount = Ticket::where('HodApprovalStatus', 'Approved')->where('TicketStatus', '!=', 'closed') 
                            ->where('userID',$user->id)->count();
        $rejectedbySupervisorCount =    Ticket::where('HodApprovalStatus', 'rejected')
        ->where('userID',$user->id)->count();                
    
        // Return the pie chart data as an associative array with the 'pie_chart' key
     
        // Return the data as an array
        return [
            'approvedCount' => $approvedCount,
            'solvedCount' => $solvedCount,
            'unsolvedCount' => $unsolvedCount,
            'rejectedbySupervisorCount'=>$rejectedbySupervisorCount,
        ];
    }
}
