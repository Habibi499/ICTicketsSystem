<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TonersRequest extends Model
{
    use HasFactory;
    protected $table = 'toners_requests';
    protected $fillable=[
      'Department',
      'QuantityRequested',
      'ItemName',
      'Recipient',
      'Updated_by'
    ];

}
