<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicianCategory extends Model
{
    // ...

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_technician_category', 'technician_category_id', 'user_id');
    }

    // ...
}
