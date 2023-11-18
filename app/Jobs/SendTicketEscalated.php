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

class SendTicketEscalated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $ticket;

    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct(Ticket $ticket, User $user)
    {
        $this->ticket = $ticket;
        $this->user = $user;
    }

      public function handle()
    {

     
       // $this->user->notify(new SendTicketEscalated($this->ticket));
     // Send the email notification
     $this->user->notify(new \App\Notifications\TicketEscalated($this->ticket));
            
    }
}
