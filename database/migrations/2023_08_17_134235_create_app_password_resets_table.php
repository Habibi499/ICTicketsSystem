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
        Schema::create('app_password_resets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('UserName');
            $table->string('SystemName');
            $table->string('UserID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_password_resets');
    }
};
