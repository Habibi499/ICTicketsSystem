<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket;

class NewTicketNotification extends Notification
{
    use Queueable;

    protected $ticket;

    /**
     * Create a new notification instance.
     *
     * @param Ticket $ticket
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
        return (new MailMessage)
        ->greeting('Dear User!')
            ->line('Your Correction Form has been created and submitted for Approval.')
            ->line('Ticket No:'. $this->ticket->id)
            ->line('Ticket Title:'.$this->ticket->Correction_Type)
            ->line('Record No:'.$this->ticket->Record_No)

            //->action('View Ticket', route('tickets.show', $this->ticket->id))
            ->action('View Ticket', 'http://192.192.1.25'.'/'.'Tickets'.'/'. $this->ticket->id)
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
