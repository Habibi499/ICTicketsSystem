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


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
      // Get all users with role_id 2 in the same department
      $approvers = User::where('department_id', $this->user->department_id)
      ->where('role_id', 2)
      ->get();

        // Send the notification to each approver
        foreach ($approvers as $approver) {
            Notification::send($approver, new NewPasswordChangeApprovalNotification($this->ticket, $this->user));
     }  
    }
}
