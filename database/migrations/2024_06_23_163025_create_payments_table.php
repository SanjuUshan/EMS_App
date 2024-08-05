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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained('employees');
            $table->decimal('basic_salary');
            $table->decimal('pay_amount');
            $table->decimal('deduction_amount')->nullable();
            $table->dateTime('pay_date');
            $table->decimal('epf');
            // $table->integer('etf');
            $table->integer('tax')->nullable();
            $table->decimal('bonus_amount')->nullable();
            $table->decimal('ot_amount')->nullable();
            $table->integer('pay_mode');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
