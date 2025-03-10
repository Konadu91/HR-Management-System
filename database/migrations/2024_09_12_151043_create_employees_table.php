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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('firstname', 100); 
            $table->string('lastname', 100);
            $table->string('email', 50)->unique(); 
            $table->string('phone', 20)->nullable(); 
            $table->string('gender', 20)->nullable(); 
            $table->date('dob'); 
            $table->date('hiredate'); 
            $table->string('position', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
