<?php

namespace App\Notifications;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket; // Import the Ticket model
class NewTicketSubmittedNotification extends Notification
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
        //$adminUsers = User::where('role_id', 3)->get();
        //$adminEmails = $adminUsers->pluck('email')->toArray();
        return (new MailMessage)->cc('webmaster@occidental-ins.com')
        ->subject('New Ticket No '   . $this->ticket->id.  ' Submitted')
        ->greeting('Dear Admin!')
            ->line('A New Ticket Has has been Submitted,Please process it.Here is ticket Summary.')
            ->line('Ticket No:'. $this->ticket->id)
            ->line('Requester:'.$this->ticket->section_head1)
            
            ->line('Ticket Title:'.$this->ticket->Correction_Type)
            
            ->line('Record No:'.$this->ticket->Record_No)
           

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
