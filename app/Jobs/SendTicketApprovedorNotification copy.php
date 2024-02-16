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
use App\Notifications\TicketApprovedNotification;
use App\Notifications\TicketRejectedNotification;
use Illuminate\Support\Facades\Notification;

class SendTicketApprovedorNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;
    protected $approvalStatus;
    protected $nextAdminUser;

    /**
     * Create a new job instance.
     *
     * @param Ticket $ticket
     * @param string $approvalStatus ('approved' or 'rejected')
     */
    public function __construct(Ticket $ticket, string $approvalStatus, User $nextAdminUser = null)
    {
        $this->ticket = $ticket;
        $this->approvalStatus = $approvalStatus;
        $this->nextAdminUser = $nextAdminUser;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        if ($this->approvalStatus === 'approved') {
            // Notify Requester for approval
            $RequesterEmail = $this->ticket->createdByUser->email;
            $Requester = User::where('email', $RequesterEmail)->first();
            $nextAdminUser = User::where('role_id', 3)->orderBy('id')->first();

            if ($Requester) {
                Notification::send($Requester, new TicketApprovedNotification($this->ticket));
            }
        } elseif ($this->approvalStatus === 'rejected') {
            // Notify Requester for rejection
            $RequesterEmail = $this->ticket->createdByUser->email;
            $Requester = User::where('email', $RequesterEmail)->first();

            if ($Requester) {
                Notification::send($Requester, new TicketRejectedNotification($this->ticket));
            }
        }

        // Update the ticket's approval status in the database
        $this->ticket->HodApprovalStatus = $this->approvalStatus;
        $this->ticket->save();
    }
}
