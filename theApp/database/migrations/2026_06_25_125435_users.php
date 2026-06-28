<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('users', function (Blueprint $table){

        $table->uuid('id')->primary();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->boolean('is_active')->default(true);
        $table->uuid('role_id');
        $table->timestamps();

        $table->foreign('role_id')
              ->references('id')
              ->on('roles')
              ->cascadeOnDelete();

    });

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('users');
    }
};
