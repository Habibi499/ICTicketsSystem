<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log;

class ReleaseLockedTickets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('ReleaseLockedTickets job is processing.'); // Log a message
         // Find tickets that have been locked for more than 20 minutes
         $lockedTickets = Ticket::where('AdminStatus', 'being worked on')
         ->whereNotNull('worker_id')
         ->where('updated_at', '<=', now()->subMinutes(1))
         ->get();
         
     // Release the locked tickets
     foreach ($lockedTickets as $ticket) {
         $ticket->worker_id = null;
         $ticket->AdminStatus = 'released'; // You can define your custom status
         $ticket->save();
    }
    Log::info('ReleaseLockedTickets job has completed.'); 
}
}