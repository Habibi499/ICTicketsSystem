<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAssignment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'last_assigned_admin_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
