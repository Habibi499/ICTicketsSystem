<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RightsMainCategory extends Model
{
    use HasFactory;
    protected $table = "Rights_main_categories";
    protected $fillable=[
        "Main_Class",
    ];
    public function systemRights()
    {
        return $this->hasMany(systemRights::class, 'parent_id');
    }
}
