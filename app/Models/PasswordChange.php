<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordChange extends Model
{
    use HasFactory;
    protected $table = 'password_changes';
        protected $fillable = [
            "Section_Head1", "Section_Head","DepartmentID", "UserID", "TicketStatus","AssignedTo",
            "HodApprovalStatus",
    ];
}
