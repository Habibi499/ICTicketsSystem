<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketNumbers extends Model
{
    use HasFactory;
    protected $table = 'Ticket_Numbers';
    protected $fillable=[
        "ticket_category",
        "ticket_No",
        "ticket_code",
    ];
    public function systemRights()
    {
        return $this->hasMany(SystemRights::class, 'ticket_id');
    }
    
}
