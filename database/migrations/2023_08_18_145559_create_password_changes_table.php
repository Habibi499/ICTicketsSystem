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
        Schema::create('password_changes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Section_Head1');
            $table->string('Section_Head');
            $table->string('Department');
            $table->string(' HodApprovalStatus');
            $table->string('UserID');
            $table->string('TicketStatus');
            $table->string('AssignedTo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_changes');
    }
};
