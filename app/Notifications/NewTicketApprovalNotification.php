<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket; // Import the Ticket model
use App\Models\User;

class NewTicketApprovalNotification extends Notification
{
    use Queueable;

    protected $ticket;
    protected $user;
    protected $approver;

    /**
     * Create a new notification instance.
     *
     * @param Ticket $ticket The ticket instance
     */
    public function __construct(Ticket $ticket, User $user, User $approver)
    {
        $this->ticket = $ticket;
        $this->user = $user;
        $this->approver = $approver;
    }
    

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new Genesys correction Form is awaiting your approval.')
            ->line('Please Approve for it to be processed.')
            ->line('Ticket No : '. $this->ticket->id)
            ->line('Requester Name : '. $this->ticket->section_head1)
            ->line('Ticket Title : '.$this->ticket->TicketCategory)
            ->line('Ticket Details : '.$this->ticket->Correction_Details)
            ->line('Rejected By : '.$this->approver)
            ->action('View Ticket', 'http://192.192.1.25'.'/'.'Tickets'.'/'. $this->ticket->id)
            ->line('Thank you for your attention.');
    }

    
}
