<?php
namespace App\Jobs;

use App\Models\systemRights;
use App\Models\Ticket; 
use App\Notifications\RightsRequestTicketApprovalNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRightsTicketApprovedorNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;
    protected $status;

    /**
     * Create a new job instance.
     *
     * @param \App\Models\systemRights $ticket
     * @param string $status
     */
    public function __construct(systemRights $ticket, string $status)
    {
        $this->ticket = $ticket;
        $this->status = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $message = "Your ticket with number {$this->ticket->ticket_No} has been {$this->status}.";
            $this->ticket->user->notify(new RightsRequestTicketApprovalNotification($this->ticket, $this->status));
        } catch (\Exception $e) {
            // Handle the exception
            report($e);
        }
    }
}