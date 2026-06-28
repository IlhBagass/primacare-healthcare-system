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
        Schema::create('patient', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->integer('nik');
            $table->string('full_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('blood_type');
            $table->string('address');
            $table->integer('phone');
            
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient');
    }
};
