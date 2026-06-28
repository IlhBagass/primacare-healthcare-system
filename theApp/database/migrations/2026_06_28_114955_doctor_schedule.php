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
        Schema::create('doctor_schedule', function (Blueprint $table){
            $table->uuid('id')->primary();
            $table->uuid('doctor_id');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');

            $table->foreign('doctor_id')
                  -> references('id')
                  ->on('doctor')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_schedule');
    }
};
