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
        Schema::create('classtimetables', function (Blueprint $table) {
            $table->id();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('subject_group')->nullable();
            $table->string('subject')->nullable();
            $table->string('teacher')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->string('day')->nullable();
            $table->string('room_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classtimetables');
    }
};
