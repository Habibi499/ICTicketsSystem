<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;

class AdminChartController extends Controller
{
    public function generateChart()
{
    // Fetch all admin users with role_id 3
    $admins = User::where('role_id', 3)->get();

    // Initialize an array to store admin data
    $adminData = [];

    // Loop through admin users and calculate assigned and solved tickets
    foreach ($admins as $admin) {
        $adminName = $admin->name;
        $assignedTickets = Ticket::where('Assignedto', $admin->id)->count();
        $solvedTickets = Ticket::where('Assignedto', $admin->id)->where('TicketStatus', 'closed')->count();
        $solvedTicketsby = Ticket::where('Solvedby', $admin->id)->where('TicketStatus', 'closed')->count();
        // Create an array for each admin
        $adminData[] = [
            'admin_name' => $adminName,
            'assigned_tickets' => $assignedTickets,
            'solved_tickets' => $solvedTickets,
            
        ];
    }

    //admin data
    return $adminData;
}

public function generateAdminStats()
{
    // Retrieve ticket statistics for pie chart
    $approvedCount = Ticket::where('HodApprovalStatus', 'Approved')->count();
    $solvedCount = Ticket::where('HodApprovalStatus', 'Approved')->where('TicketStatus', 'closed')->count();
    $unsolvedCount = Ticket::where('HodApprovalStatus', 'Approved')->where('TicketStatus', '!=', 'closed')->count();

    // Return the pie chart data as an associative array with the 'pie_chart' key
    return [
        'pie_chart' => [
            'approvedCount' => $approvedCount,
            'solvedCount' => $solvedCount,
            'unsolvedCount' => $unsolvedCount,
        ],
    ];
}


}