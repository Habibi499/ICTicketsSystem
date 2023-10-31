<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewTicketSubmittedNotification;
use Illuminate\Support\Collection;
use App\Models\TicketCategory;

class AssignTicketToAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function handle()
    {
        try {
            // Get the last assigned admin user ID for this ticket's user
            $lastAssignedAdminId = UserAssignment::where('user_id', $this->ticket->UserID)->value('last_assigned_admin_id');

            // Retrieve all admin users
            $ticketCategory = $this->ticket->TicketCategory; 
            //$adminUsers = User::where('role_id', 3)->get();
          // Assuming you have a TicketCategory model and want to retrieve the IDs of relevant categories.
            $ticketCategoryIds = TicketCategory::whereIn('id', [1, 2])->pluck('id')->toArray();

            $adminUsers = User::where('role_id', 3)
            ->where('leavestatus', 'present')
            ->whereHas('ticket_categories', function ($query) use ($ticketCategoryIds) {
                $query->whereIn('ticket_categories.id', $ticketCategoryIds);
            })
            ->get();
        


            if ($adminUsers->isEmpty()) {
                Log::info('No admin users available for ticket ID: ' . $this->ticket->id);
                return;
            }

            // Calculate the index of the next admin user in a circular manner
            $nextIndex = $this->calculateNextAdminIndex($lastAssignedAdminId, $adminUsers);

            // Get the next admin user to assign the ticket
            $nextAdminUser = $adminUsers[$nextIndex];

            // Log the next admin user and ticket assignment
            Log::info('Ticket Category: ' . $this->ticket->TicketCategory);
            Log::info('Assigning ticket ID ' . $this->ticket->id . ' to admin user ID ' . $nextAdminUser->id. ' to admin user ID ' . $nextAdminUser->email);
            // Log the ticket category
            // Update the ticket with the assigned admin user
            $this->ticket->AssignedTo = $nextAdminUser->id;
            $this->ticket->save();

            // Update the last_assigned_admin_id for the user
            UserAssignment::updateOrCreate(
                ['user_id' => $this->ticket->UserID],
                ['last_assigned_admin_id' => $nextAdminUser->id]
            );
        } catch (\Exception $e) {
            // Handle any exceptions that occur during job execution
            Log::error('Error in AssignTicketToAdmin job: ' . $e->getMessage());
        }

          // Dispatch the notification to the next admin user
          Notification::send($nextAdminUser, new NewTicketSubmittedNotification($this->ticket));
    }



    protected function calculateNextAdminIndex($lastAssignedAdminId, $adminUsers)
    {
        // Collect the admin users into a collection for easier manipulation
        $adminUsersCollection = collect($adminUsers);

        // Find the index of the last assigned admin user in the collection
        $currentIndex = $adminUsersCollection->search(function ($adminUser) use ($lastAssignedAdminId) {
            return $adminUser->id === $lastAssignedAdminId;
        });

        if ($currentIndex === false) {
            // If the last assigned admin was not found or is null, start from the first admin
            return 0;
        } else {
            // Calculate the index of the next admin user in a circular manner
            $nextIndex = ($currentIndex + 1) % $adminUsersCollection->count();
            return $nextIndex;
        }
    }
    protected function dispatchNewTicketSubmittedNotificationToAdmin($adminUsers, $nextIndex)
    {
        $ticket = $this->ticket; // Assuming you have the $ticket instance available
        $nextAdminUser = $adminUsers[$nextIndex]; // Assuming you have $nextAdminUser available

        // Dispatch the notification to the next admin user
        if ($nextAdminUser) {
            $nextAdminUser->notify(new NewTicketSubmittedNotification($ticket));
        }
    }
}
