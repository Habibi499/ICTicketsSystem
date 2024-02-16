<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RightsRequisition extends Model
{
    use HasFactory;
    protected $table = "invoices";

    protected $fillable = [
        "Main_Class",
        "Categories",
        "view_only",
        "add_details",
        "DrNote",
    ];
}
