<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket; 

class TicketSolvedNotification extends Notification
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

    public function toMail($notifiable)
    {
            $subject = 'Ticket No ' . $this->ticket->id;

            if ($this->ticket->ITTechnicianReply  !== null) {
                $subject .= 'Re-Solved';
            } else{
                $subject .= 'Solved';
            }

        $comment = $this->ticket->ITTechnicianReply !== null
        ? 'Technician\'s Reply: ' . $this->ticket->ITTechnicianReply
        : 'Technician\'s Comment: ' . $this->ticket->ITTechnicianComments;
       
    return (new MailMessage)
         ->subject($subject)
        ->line('Your ticket has been solved.')
        ->line('Ticket Number: ' . $this->ticket->id)
        ->line('Technician: ' .  $this->ticket->Solvedby)
        ->line($comment)
        ->line('Policy Code: ' .  $this->ticket->Record_No)
         ->action('View Ticket', 'http://192.192.1.25'.'/Tickets'.'/'. $this->ticket->id)
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
