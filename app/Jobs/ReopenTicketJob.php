<?php

namespace App\Jobs;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Notifications\TicketReopenedNotification;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;

class ReopenTicketJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct(Ticket $ticket, $user)
    {
        $this->ticket = $ticket;
        $this->user = $user;
    }


    public function handle(): void
    {
     
         // Retrieve the admin who solved the ticket by name
         $adminName = $this->ticket->Solvedby; // Assuming 'solved_by' is the name of the admin in the 'tickets' table

         // Find the admin user by name
         $admin = User::where('name', $adminName)->first();

         if ($admin) {
             // Notify the admin who solved the ticket
             Notification::send($admin, new TicketReopenedNotification($this->ticket,$admin));
         }
         Log::info('Admin ID: ' .  $adminName. ', Admin name: ' . $admin->name);
         // Update ticket status to reopened
         $this->ticket->update(['status' => 'reopened']);

         // Notify the user who opened the ticket
        // Notification::send($this->user, new TicketReopenedNotification($this->ticket, $admin));
        
    }
}
