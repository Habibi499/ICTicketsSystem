<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TicketReminder;

class CheckTicketStatus extends Command
{
    protected $signature = 'tickets:check-status';
    protected $description = 'Check Ticket Approval Status and Send Reminders';

    public function handle()
    {
        $threshold = now()->subHours(4);

        $tickets = Ticket::where('HodApprovalStatus', 'unapproved')
            ->where('updated_at', '<', $threshold)
            ->get();

        foreach ($tickets as $ticket) {
            // Send a reminder notification to the approver
            $ticket->approver->notify(new TicketReminder($ticket));

            // Optionally, you can update a field in the Ticket model to track the last reminder sent time
            $ticket->update(['last_reminder_sent_at' => now()]);
        }

        $this->info('Ticket status check completed.');
    }
}
