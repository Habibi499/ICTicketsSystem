<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon; 
class UserActivity extends Model
{
    use HasFactory;
    protected $table = 'user_activity'; // Set the table name if it's different from the default.

    protected $fillable = [
        'user_id',
        'login_time',
        'logout_time',
    ];
   

    // Define the belongsTo relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isUserActive()
    {
        return $this->logout_time === null;
    }


    public function calculateDuration()
    {
        // Check if login_time is set and not null
        if ($this->login_time) {
            $loginTime = Carbon::parse($this->login_time); // Parse the login_time as a Carbon instance
            $currentTime = now();

            // Calculate the duration in minutes
            $duration = $loginTime->diffInMinutes($currentTime);

            return $duration . ' minutes'; // You can format the output as needed
        }

        return 'N/A'; // Handle the case where login_time is not set
    }
}
