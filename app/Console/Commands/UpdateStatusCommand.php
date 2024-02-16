<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log; // Add this line

use App\Models\User;

class UpdateStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-status-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set all Technicians to Absent when it reaches 5:00 PM';

    public function handle()
    {
        // Get all users whose status needs to be updated
        $users = User::where('LeaveStatus', 'present')->get();
          // Log information about 'present' users
          foreach ($users as $user) {
            Log::info("Present User: {$user->id}, Name: {$user->name}, Email: {$user->email}");
        }

      
        Log::info('UpdateStatusCommand started');
        foreach ($users as $user) {
            try {
                $user->update([
                    'LeaveStatus' => 'absent',
                ]);
            } catch (\Exception $e) {
                Log::error("Error updating user {$user->id}: " . $e->getMessage());
            }
        }
        // Log information about users updated to 'absent'
        Log::info("User Updated to Absent: {$user->id}, Name: {$user->name}, Email: {$user->email}");
        
        // Your update logic here
        Log::info('UpdateStatusCommand finished');
    }
    
}
