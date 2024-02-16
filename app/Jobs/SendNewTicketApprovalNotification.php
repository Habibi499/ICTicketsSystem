<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Notifications\NewPasswordChangeApprovalNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use App\Models\User;
class SendNewTicketApprovalNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $ticket;
    protected $user;
    protected $approver;
    /**
     * Create a new job instance.
     */
    public function __construct($ticket, $user,$approver)
    {
        $this->ticket = $ticket;
        $this->user = $user;
        $this->approver = $approver;
    }


    public function handle(): void
    {
        // Get the chosen approver's user
        $approverUserId = $this->ticket->HodApproverName;

        // Fetch the user with the specified id
        $approver = User::find($approverUserId);

        // Check if the approver has rights
        if ($approver && $approver->role_id == 2) {
            // Send the notification to the specified approver
            Notification::send($approver, new NewPasswordChangeApprovalNotification($this->ticket, $this->user));
        } else {
            Log::error("Error sending notification. Approver not found or incorrect role_id. Ticket ID: {$this->ticket->id}");
        }
    }

}
