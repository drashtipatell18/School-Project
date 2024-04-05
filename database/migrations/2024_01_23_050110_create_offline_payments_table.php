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
        Schema::create('offline_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('admissionno')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('student')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('submit_date')->nullable();
            $table->string('amount')->nullable();
            $table->string('reference')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_mode')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_payments');
    }
};
