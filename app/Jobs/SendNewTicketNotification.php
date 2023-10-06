<?php

namespace App\Jobs;
use App\Notifications\NewTicketNotification;
use App\Notifications\NewPasswordChangeApprovalNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use App\Models\User;

class SendNewTicketNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $ticket;
    protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct($ticket, $user)
    {
        $this->ticket = $ticket;
        $this->user = $user;
    }


    /**
     * Execute the job.
     */
    public function handle()
    {

        //send the email notification
        $this->user->notify(new NewTicketNotification($this->ticket));

            
    }
}
