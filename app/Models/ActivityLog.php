<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['user_id', 'record_id', 'action', 'details'];

    public function user()
    {
        return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id'); // Assuming 'user_id' is the foreign key in your activity_logs table
    }

    public function record()
    {
        return $this->belongsTo(Ticket::class, 'record_id');
    }

   
}
