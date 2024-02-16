<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class systemRights extends Model
{
    use HasFactory;
    protected $table = "system_rights_requisition";

    protected $fillable = [
        "parent_id",
        "Categories",
        "view_only",
        "add_details",
        "save_details",
        "Query_data",
        "print_data",
        "DrNote",
        "Main_Class_Name",
        "ticket_No",
        "ticket_id",
        "Requester_Name",
        "Requested_For",
        "HodApprovalStatus",
        "hiddenApproverName",
        "HodApproverName",
        "TicketStatus",
        "departmentID",
        "rejectReason",
        "UserID",
        "TicketCategory",
        'last_assigned_admin_id',
        'AssignedtoName',
        "Department",
        "Solvedby",
        "Section_Head",
        "EScalatedBy",
        "EscalatorComments",
        "EScalatedto",
        "worker_id",
        "AdminStatus",
        "ITTechnicianComments",
        "ImpactAnalysis",

    ];
    public function rightsMainCategory()
    {
        return $this->belongsTo(RightsMainCategory::class, 'parent_id');
    }
    public function ticketNumber()
    {
        return $this->belongsTo(TicketNumbers::class, 'ticket_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID'); // Assuming the foreign key is user_id
    }

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class, "ticketcategory");
    }
        // Inside your systemRights model
        public function assignedAdmin()
        {
            return $this->belongsTo(User::class, 'Assignedto');
        }

    
}
