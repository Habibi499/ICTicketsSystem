<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toner extends Model
{
    use HasFactory;

 
    
        public function printer()
        {
            return $this->belongsTo(Printer::class, 'printer_id'); // 'printer_id' is the foreign key in the 'toners' table
        }
    
    
    
    protected $fillable = [
        "printer_id", "TonerName","QuantityInStore"
       
    ];
}

