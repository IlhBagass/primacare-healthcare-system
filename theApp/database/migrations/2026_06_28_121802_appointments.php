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
        Schema::create('appointments', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->uuid('patient_id');
            $table->uuid('doctor_id');
            $table->uuid('schedule_id');
            $table->date('appointment_date');
            $table->string('complaint');
            $table->string('status');
            $table->timestamps();

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patient')
                  ->cascadeOnDelete();

            $table->foreign('doctor_id')
                  ->references('id')
                  ->on('doctor')
                  ->cascadeOnDelete();

            $table->foreign('schedule_id')
                  ->references('id')
                  ->on('doctor_schedule')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appintments');
    }
};
