<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket; //
class TicketReopenedNotification extends Notification
{
    use Queueable;
    protected $ticket;
    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
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
        return (new MailMessage)->cc('webmaster@occidental-ins.com')
        ->subject('Ticket No '   . $this->ticket->id.  'Has been Reopened')
        ->greeting('Dear Admin!')
            ->line('A Ticket has been Re-opened,Please process it.Here is ticket Summary.')
            ->line('Ticket No:'. $this->ticket->id)
            ->line('Requester:'.$this->ticket->section_head1)
            ->line('Ticket Title:'.$this->ticket->Correction_Type)
            ->line('Record No:'.$this->ticket->Record_No)
            ->line('Ticket Summary:'.$this->ticket->Correction_Details)
            ->line('Re-Opening Comments:'.$this->ticket->ReopeningComments)
            ->action('View Ticket', 'http://192.192.1.25'.'/'.'Ticket/'. $this->ticket->id)

            ->action('View Ticket', route('tickets.show', $this->ticket->id))
            ->line('Thank you.')
            ->salutation('ICT Help Desk Team');
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
