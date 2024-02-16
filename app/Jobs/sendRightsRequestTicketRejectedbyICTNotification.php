<?php

namespace App\Jobs;

use App\Models\systemRights;
use App\Notifications\RightsRequestTicketRejectedByICTNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRightsRequestTicketRejectedByICTNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;
   

    /**
     * Create a new job instance.
     *
     * @param systemRights $ticket
     * @param string $comment
     */
    public function __construct(systemRights $ticket)
    {
        $this->ticket = $ticket;
    
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // Notify the user about the rejected ticket
            $this->ticket->user->notify(new RightsRequestTicketRejectedByICTNotification($this->ticket));
        } catch (\Exception $e) {
            // Handle exception if notification fails
            \Log::error("Failed to send rejection notification: " . $e->getMessage());
        }
    }
}
