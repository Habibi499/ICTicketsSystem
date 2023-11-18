<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket; // Import the Ticket model
class TicketEscalated extends Notification
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
        //->subject('New Ticket'      . $this->ticket->id.   'Escacalated')
        ->subject('New Escalated Ticket No '   . $this->ticket->id)
                    ->greeting('Dear Admin!')
                    ->line('A Ticket Has been escalated to you  Please process it.Here is ticket Summary')
                    ->line('Escalated By:'. $this->ticket->EScalatedBy)
                    ->line('Escalator Comments:'. $this->ticket->EscalatorComments)
                    ->line('Ticket No:'. $this->ticket->id)
                    ->line('Requester:'.$this->ticket->section_head1)
                    ->line('Ticket Title:'.$this->ticket->Correction_Type)
                    ->line('Record No:'.$this->ticket->Record_No)
                    ->line('Ticket Summary:'.$this->ticket->Correction_Details)
                    ->action('View Ticket', 'http://192.192.1.25'.'/Tickets'.'/'. $this->ticket->id)
                    ->line('Thank you for using our application!')
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
