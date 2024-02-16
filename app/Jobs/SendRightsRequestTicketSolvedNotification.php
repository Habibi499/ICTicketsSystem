<?php
// File: app/Jobs/SendRightsRequestTicketSolvedNotification.php

namespace App\Jobs;
// File: app/Jobs/SendRightsRequestTicketSolvedNotification.php

namespace App\Jobs;

use App\Models\systemRights;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRightsRequestTicketSolvedNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;

    /**
     * Create a new job instance.
     *
     * @param  \App\Models\systemRights  $ticket
     * @return void
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
        // Logic to send the ticket solved notification
        $this->ticket->user->notify(new \App\Notifications\RightsReqeuestTicketSolvedNotification($this->ticket));
    }
}

