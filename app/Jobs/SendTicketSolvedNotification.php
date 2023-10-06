<?php
namespace App\Jobs;
use App\Models\Ticket; // Fix the namespace to use lowercase "app"
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\TicketSolvedNotification; // Import the correct notification class

class SendTicketSolvedNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
            $this->ticket->createdByUser->notify(new TicketSolvedNotification($this->ticket, $this->comment));
        }
    }
}

