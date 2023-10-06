<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Tickets', function (Blueprint $table) {
            $table->id();
            $table->string('section_head1')->nullable();
            $table->string('Section_Head')->nullable();
            $table->string('DepartmentID')->nullable();
            $table->string('TicketCategoryID')->nullable();
            $table->string('Correction_Type')->nullable();
            $table->string('Ticket_Urgency')->nullable();
			$table->string('TicketStatus')->nullable();
            $table->string('Record_No')->nullable();
            $table->string('Correction_Details')->nullable();
            $table->string('HodApprovalStatus')->nullable();
            $table->string('rejectionReason')->nullable();
            $table->string('HodApproverName')->nullable();
            $table->string('technician_id')->nullable();
			$table->string('Assignedto')->nullable();
            $table->string('Solvedby')->nullable();
			$table->string('ITTechnicianComments')->nullable();
            $table->string('UserID')->nullable();
            $table->timestamps();
            $table->string('DateClosed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
