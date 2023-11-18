<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketReminder extends Notification
{
    use Queueable;

    protected $ticket;

    public function __construct($ticket)
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
        ->line("Dear Approver,")
        ->line("This is a reminder that the following Ticket has not been approved for:")
        ->line("Ticket ID: " . $this->ticket->id)
        ->line('Requester Name : '. $this->ticket->section_head1)
        ->line('Ticket Title : '.$this->ticket->TicketCategory)
        ->line('Ticket Details : '.$this->ticket->Correction_Details)
       // ->line("Approver Email: " . $approverEmail)
        ->line("Please take appropriate action.")
        ->action('View Ticket', 'http://192.192.1.25'.'/Tickets'.'/'. $this->ticket->id)
        ->line("Thank you!")
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
