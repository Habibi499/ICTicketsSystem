<?php

namespace App\Console\Commands;
use App\Models\UserAssignment;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Models\Ticket;

class CheckUnassignedTickets extends Command
{
    protected $signature = 'tickets:check-unassigned';
    protected $description = 'Check and display unassigned tickets';

    public function handle()
    {
        $ticketsToAssign = Ticket::where(function ($query) {
            $query->whereNull('AssignedTo')->orWhere('AssignedTo', '');
        })->where('HodApprovalStatus', 'approved')->get();
        
        foreach ($ticketsToAssign as $ticket) {
            // Get the last assigned admin user ID for this ticket's user
            $lastAssignedAdminId = UserAssignment::where('user_id', $ticket->UserID)->value('last_assigned_admin_id');

            // Retrieve all admin
            $ticketCategoryIds = TicketCategory::whereIn('id', [1, 2])->pluck('id')->toArray();
            $adminUsers = User::where('role_id', 3)
                ->where('LeaveStatus', 'present')
                ->whereHas('ticket_categories', function ($query) use ($ticketCategoryIds) {
                    $query->whereIn('ticket_categories.id', $ticketCategoryIds);
                })
                ->get();

            if ($adminUsers->isEmpty()) {
                $this->info('No admin users available for ticket ID: ' . $ticket->id);
                continue;
            }

            // Calculate the index of the next admin user in a circular manner
            $nextIndex = $this->calculateNextAdminIndex($lastAssignedAdminId, $adminUsers);

            // Get the next admin user to assign the ticket
            $nextAdminUser = $adminUsers[$nextIndex];

            // Update the ticket with the assigned admin user
            $ticket->AssignedTo = $nextAdminUser->id;
            $ticket->save();

            // Update the last_assigned_admin_id for the user only if the admin is present
            if ($nextAdminUser->LeaveStatus == 'present') {
                UserAssignment::updateOrCreate(
                    ['user_id' => $ticket->UserID],
                    ['last_assigned_admin_id' => $nextAdminUser->id]
                );
            }

            $this->info('Assigned ticket ID ' . $ticket->id . ' to admin user ID ' . $nextAdminUser->id);
            Log::channel('ticket_assignment')->info(
                'Assigned ticket ID ' . $ticket->id .
                ' to admin user ID ' . $nextAdminUser->id .
                ' Name ' . $nextAdminUser->name .
                ' Email ' . $nextAdminUser->email
            );
            
        }

        $this->info('Ticket assignment completed.');
    }

    protected function calculateNextAdminIndex($lastAssignedAdminId, $adminUsers)
    {
        $adminUsersCollection = collect($adminUsers);
        $currentIndex = $adminUsersCollection->search(function ($adminUser) use ($lastAssignedAdminId) {
            return $adminUser->id === $lastAssignedAdminId;
        });

        if ($currentIndex === false) {
            return 0; // Start from the first admin
        } else {
            return ($currentIndex + 1) % $adminUsersCollection->count();
        }
    }
}

