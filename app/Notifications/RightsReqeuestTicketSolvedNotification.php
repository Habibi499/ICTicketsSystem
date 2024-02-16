<?php
namespace App\Notifications;

use App\Models\systemRights;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RightsReqeuestTicketSolvedNotification extends Notification
{
    use Queueable;

    protected $ticket;
    protected static $processedTicketNos = [];

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\systemRights $ticket
     */
    public function __construct(systemRights $ticket)
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
        $ticketNo = $this->ticket->ticket_No;
        $Solvedby= $this->ticket->Solvedby;
        $ITTechnicianComments=$this->ticket->ITTechnicianComments;
        // Check if the ticket_no has been processed already
        if (!in_array($ticketNo, self::$processedTicketNos)) {
            self::$processedTicketNos[] = $ticketNo; // Mark as processed

            return (new MailMessage)
                ->line('Your Rights Request (Ticket No: ' . $ticketNo . ') ')
                ->line('Solved by:'. $Solvedby )
                ->line('Technician Comments:'. $ITTechnicianComments )
                ->action('View Ticket', 'http://192.192.1.25'.'/Tickets'.'/' . $ticketNo)
                ->line('Thank you for using our application!');
        } else {
            // Return an empty message for already processed ticket_no
            return (new MailMessage);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'ticket_no' => $this->ticket->ticket_No,
            // Add other data if needed
        ];
    }
}


