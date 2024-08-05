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
            $table->id();
            $table->foreignId('bank_id')->constrained('banks');
            $table->foreignId('section_id')->constrained('sections');
            $table->string('initials')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('nic')->nullable();
            $table->integer('gender')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('mobile')->nullable();
            $table->dateTime('joined_date')->nullable();
            $table->integer('role')->default(1);
            $table->integer('status')->default(1);
            $table->integer('emp_type')->default(1);
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
