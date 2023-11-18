<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;

class AdminChartController extends Controller
{
    public function generateChart()
    {
        $admins = User::where("role_id", 3)->get();

        // Initialize an array to store admin data
        $adminData = [];
        // Loop through admin users
        foreach ($admins as $admin) {
            $adminName = $admin->name;
            $assignedTickets = Ticket::where("Assignedto", $admin->id)->count();
            $solvedTickets = Ticket::where("Solvedby", $admin->name)
                ->where("TicketStatus", "closed")
                ->count();
            $rejectedTickets = Ticket::where("Solvedby", $admin->id)
                ->where("TicketStatus", "closed")
                ->count();
            // each admin array
            $adminData[] = [
                "admin_name" => $adminName,
                "assigned_tickets" => $assignedTickets,
                "solved_tickets" => $solvedTickets,
            ];
        }
        return $adminData;
    }

    public function generateAdminStats()
    {
        $approvedCount = Ticket::where("HodApprovalStatus", "Approved")->count();
        $solvedCount = Ticket::where("HodApprovalStatus", "Approved")
            ->where("TicketStatus", "closed")->count();
        //$unsolvedCount = Ticket::where("HodApprovalStatus", "Approved")
           // ->whereNotIn("TicketStatus", ["closed", "rejected"])->count();
            $unsolvedCount = Ticket::where("HodApprovalStatus", "Approved")
            ->where("TicketStatus", "rejected")->count();
    
        // pie chart data as an associative array with the 'pie_chart' key
        return [
            "pie_chart" => [
                "approvedCount" => $approvedCount,
                "solvedCount" => $solvedCount,
                "unsolvedCount" => $unsolvedCount,
                
            ],
        ];
    }
    public function GenerateITDepartmentStats()
    {
        $TotalTicketsCount = Ticket::count();
        $approvedCount = Ticket::where(
            "HodApprovalStatus",
            "Approved"
        )->count();
        $solvedCount = Ticket::where("HodApprovalStatus", "Approved")
            ->where("TicketStatus", "closed")
            ->whereNotNull("Solvedby")
            ->whereNotNull("Assignedto")
            ->whereNotNull("ITTechnicianComments")
            ->count();
        $unsolvedCount = Ticket::where("HodApprovalStatus", "Approved")
            ->where("TicketStatus", "!=", "closed")
            ->count();
        $rejectedbySupervisorCount = Ticket::where(
            "HodApprovalStatus",
            "rejected"
        )->count();
        // Return the data as an array
        return [
            "approvedCount" => $approvedCount,
            "solvedCount" => $solvedCount,
            "unsolvedCount" => $unsolvedCount,
            "rejectedbySupervisorCount" => $rejectedbySupervisorCount,
            "TotalTicketsCount" => $TotalTicketsCount,
        ];
    }
    public function generateTicketsStats()
    {
        $approvedCount = Ticket::where(
            "HodApprovalStatus",
            "Approved"
        )->count();
        $solvedCount = Ticket::where("HodApprovalStatus", "Approved")
            ->where("TicketStatus", "closed")
            ->count();
        $unsolvedCount = Ticket::where("HodApprovalStatus", "Approved")
            ->where("TicketStatus", "!=", "closed")
            ->count();

        $barChartData = [
            "approvedCount" => $approvedCount,
            "solvedCount" => $solvedCount,
            "unsolvedCount" => $unsolvedCount,
        ];

        return $barChartData;
    }
    public function GenerateTicketsByCategory()
    {
        // Initialize an array to store admin data
        $categories = [
            "Renewal",
            "NewBusiness",
            "Endorsement",
            "Password-Change",
            "Accounts",
            "Claims",
        ];

        // Initialize arrays to store counts for each category
        $solvedCounts = [];
        $unsolvedCounts = [];
        $totalCounts = [];

        foreach ($categories as $category) {
            $totalCount = Ticket::where("Correction_Type", $category)->count();
            $totalCounts[$category] = $totalCount;

            $rejectedbySupervisorCount = Ticket::where(
                "HodApprovalStatus",
                "rejected"
            )
                ->where("Correction_Type", $category)
                ->count();
            $rejectedbySupervisorCounts[$category] = $rejectedbySupervisorCount;

            $approvedbySupervisorCount = Ticket::where(
                "HodApprovalStatus",
                "approved"
            )
                ->where("Correction_Type", $category)
                ->count();
            $approvedbySupervisorCounts[$category] = $approvedbySupervisorCount;

            $solvedCount = Ticket::where("HodApprovalStatus", "approved")
                ->where("TicketStatus", "closed")
                ->where("Correction_Type", $category)
                ->count();
            $solvedCounts[$category] = $solvedCount;

            $unsolvedCount = Ticket::where("HodApprovalStatus", "approved")
                ->where("TicketStatus", "!=", "closed")
                ->where("Correction_Type", $category)
                ->count();
            $unsolvedCounts[$category] = $unsolvedCount;
        }

        return [
            "categories" => $categories,
            "solvedCounts" => $solvedCounts,
            "rejectedbySupervisorCounts" => $rejectedbySupervisorCounts,
            "approvedbySupervisorCounts" => $approvedbySupervisorCounts,
            "unsolvedCounts" => $unsolvedCounts,
            "totalCounts" => $totalCounts,
        ];
    }
}
