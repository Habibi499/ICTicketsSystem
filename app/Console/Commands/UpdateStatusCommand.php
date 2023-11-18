<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all users whose status needs to be updated
        $users = User::where('LeaveStatus', 'present')->get();
        //Log::info('UpdateStatusCommand started');
      
        // Check if the current time is 17:00 (5:00 PM)
        if (now()->hour >= 19) {
            foreach ($users as $user) {
                $user->update([
                    'status' => 'absent',
                ]);
            }
        }
          // Your update logic here
          //Log::info('UpdateStatusCommand finished');
    }
}
