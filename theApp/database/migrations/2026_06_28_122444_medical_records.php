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
        Schema::create('medical_records', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->uuid('appointment_id');
            $table->uuid('doctor_id');
            $table->uuid('patient_id');
            $table->text('symptoms');
            $table->text('diagnosis');
            $table->text('notes');
            $table->timestamps();

            $table->foreign('appointment_id')
                  ->references('id')
                  ->on('appointments')
                  ->cascadeOnDelete();

            $table->foreign('doctor_id')
                  ->references('id')
                  ->on('doctor')
                  ->cascadeOnDelete();
            
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patient')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
