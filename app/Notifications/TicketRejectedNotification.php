<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket;
use App\Models\User;
class TicketRejectedNotification extends Notification
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
                    ->line('Dear User')
                    ->line('Your Request has been rejected by your Supervisor.')
                    ->line('Ticket No : '. $this->ticket->id)
                    ->line('Requester Name : '. $this->ticket->section_head1)
                    ->line('Ticket Title : '.$this->ticket->TicketCategory)
              
                    ->action('View Ticket', 'http://192.192.1.25'.'/Tickets'.'/'. $this->ticket->id)
                    ->line('Consider opening another ticket')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
