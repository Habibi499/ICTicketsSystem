<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket; 

class TicketRejectedbyICTNotification extends Notification
{
    use Queueable;


    protected $ticket;
    protected $ITTechnicianComments;

    public function __construct(Ticket $ticket, $ITTechnicianComments)
    {
        $this->ticket = $ticket;
        $this->ITTechnicianComments = $ITTechnicianComments;
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
        ->subject('Ticket No  ' . $this->ticket->id. '  Rejecetd by ICT')
        ->line('Your Request has been rejected by your ICT Admin')
        ->line('Ticket Number: ' . $this->ticket->id)
        ->line('Technician: ' .  $this->ticket->Solvedby)
        ->line('Technician\'s Comment: ' .  $this->ticket->ITTechnicianComments)
        ->line('Policy Code: ' .  $this->ticket->Record_No)
        // ->action('View Ticket', route('tickets.show', ['ticket' => $this->ticket->id]))
         ->action('View Ticket', 'http://192.192.1.25'.'/Tickets'.'/'. $this->ticket->id)
         ->line('Please Consider Reopening the ticket')
        ->line('Thank you for using our application.')
        ->bcc('webmaster@occidental-ins.com'); // Send a copy to the specific email
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
