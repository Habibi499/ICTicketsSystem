<?php
namespace App\Notifications;

use App\Models\Ticket;
use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPasswordChangeApprovalNotification extends Notification
{
    use Queueable;

    use Queueable;
    protected $ticket;
    //protected $ITTechnicianComments;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
       // $this->ITTechnicianComments = $ITTechnicianComments;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Genesys Correction Approval for Ticket No  '   . $this->ticket->id.  ' Submitted')
        ->line('A new Genesys correction Form is awaiting your approval.')
        ->line('Please Approve for it to be processed.')
        ->line('Ticket No : '. $this->ticket->id)
        ->line('Requester Name : '. $this->ticket->section_head1)
        ->line('Ticket Title : '.$this->ticket->Record_No)
        ->line('What is required : '.$this->ticket->Correction_details)
        ->action('View Ticket', route('tickets.show', $this->ticket->id))
        ->line('Thank you for your attention.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
