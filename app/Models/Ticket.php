<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TicketApprovedNotification;
use App\Notifications\TicketRejectedNotification;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'invoices'; 

    protected $fillable = [
        "Requester_Name", "Section_Head","Correction_Type", "Ticket_Urgency", "TicketStatus","Record_No","Correction_Details",
        "HodApprovalStatus","UserID","DepartmentID","Approver_id","HodApproverName",
        "section_head1","Assignedto","ITTechnicianComments","TicketCategory","documents","Solvedby",
        "rejectionReason","RenewalNo","EndorsementNo","claimNumber","pvNumber",
        "correction_category","correction_sub_category"
       
    ];
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
    //Approver
    public function approver()
    {
        return $this->belongsTo(User::class, 'HodApproverName'); 
    }
   //Assigned Admin Relationship
   public function assignedAdmin()
        {
            return $this->belongsTo(User::class, 'Assignedto');
        }


    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class, 'ticketcategory');
    }
       

    use Notifiable;

    public function sendInvoiceApprovedNotification()
    {
        $this->notify(new TicketApprovedNotification());
    }

    public function sendInvoiceRejectedNotification()
    {
        $this->notify(new TicketRejectedNotification());
    }

}
