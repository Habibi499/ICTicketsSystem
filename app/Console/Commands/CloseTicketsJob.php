<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket; // Make sure to import the Ticket model
use Carbon\Carbon;

class CloseTicketsJob extends Command
{
    protected $signature = 'tickets:close';
    protected $description = 'Close tickets that have been solved for 4 hours or more.';

    public function handle()
    {
        $tickets = Ticket::where('TicketStatus', 'Solved')
                         //->where('updated_at', '<=', Carbon::now()->subHour())
                         ->get();
    
        $count = $tickets->count();
        $this->info("Found $count tickets to close.");
    
        foreach ($tickets as $ticket) {
            $ticket->update(['TicketStatus' => 'Closed']);
        }
    
        $this->info('Tickets closed successfully.');
    }
}
