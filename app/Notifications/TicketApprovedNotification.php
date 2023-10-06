<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket;
use App\Models\User;


class TicketApprovedNotification extends Notification
{
    use Queueable;
    protected $ticket;
    protected $user;
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
        return (new MailMessage)
                    ->line('Dear User.')
                    ->line('Your Ticket No:'   .$this->ticket->id.  'has been approved and sent to ICT Team')
                    ->line('Ticket No:'. $this->ticket->id)
                    ->line('Ticket Category:'. $this->ticket->Correction_Type)
                    ->line('Policy No or PV No:'. $this->ticket->Record_No)
                    ->line('Thank you!');
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
