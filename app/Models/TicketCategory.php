<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    
    class TicketCategory extends Model
    {
        protected $table = 'ticket_categories'; // Replace with your actual table name if different
    
        public function users()
        {
            return $this->belongsToMany(User::class, 'category_user', 'id', 'user_id');
        }
    }
 
