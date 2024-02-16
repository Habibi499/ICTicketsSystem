<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\systemRights;
use App\Models\User;
use App\Notifications\RightsRequestAssignedToAdminNotification;

class AssignAdminRightsRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $adminUserId;

    public function __construct($adminUserId)
    {
        $this->adminUserId = $adminUserId;
    }

    public function handle()
    {
        try {
            // Retrieve the assigned admin's user model by using the relationship
            $adminUser = User::findOrFail($this->adminUserId);
    
            if (!$adminUser) {
                // Log or handle the case where the user is not found
                \Log::error('User not found with ID: ' . $this->adminUserId);
                return;
            }
    
            // Assuming you have $ticket and $status available
            $ticket = 'Approved'; // Replace with your logic to get the ticket
            $status = 'Test'; // Replace with your logic to get the status
    
            // Send notification for ticket assignment
            \Log::info('Sending notification to admin', ['Admin Email' => $adminUser->email]);
            $adminUser->notify(new RightsRequestAssignedToAdminNotification);
        } catch (\Exception $e) {
            // Handle exception (log or provide a meaningful error message)
            \Log::error($e->getMessage());
        }
    }
}
