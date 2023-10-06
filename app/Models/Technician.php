<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
{
    return $this->belongsToMany(TechnicianCategory::class, 'user_technician_category', 'technician_id', 'technician_category_id');
}
}