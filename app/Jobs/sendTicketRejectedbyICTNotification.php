<?php

namespace App\Jobs;
use App\Models\Ticket; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\TicketRejectedbyICTNotification;
use romanzipp\QueueMonitor\Traits\IsMonitored;
class sendTicketRejectedbyICTNotification implements ShouldQueue
{
 
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,IsMonitored;

    protected $ticket;
    protected $comment;

    /**
     * Create a new job instance.
     *
     * @param Ticket $ticket
     * @param string $comment
     */
    public function __construct(Ticket $ticket, $comment)
    {
        $this->ticket = $ticket;
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Notify the user with the TicketSolvedNotification
        if ($this->ticket->createdByUser) {
            $this->ticket->createdByUser->notify(new TicketRejectedbyICTNotification($this->ticket, $this->comment));
        }
    }
}

