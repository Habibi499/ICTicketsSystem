<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;
    protected $fillable = [
        "section_head1", "PrinterName","PrinterModel", "PrinterLocation", "PrinterIPaddress"
       
    ];

   
        public function toners()
        {
            return $this->hasMany(Toner::class);
        }
    

}
