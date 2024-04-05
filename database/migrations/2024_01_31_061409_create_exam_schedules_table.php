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
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('exam_group')->nullable();
            $table->string('exam')->nullable();
            $table->string('subject')->nullable();
            $table->date('date_from')->nullable();
            $table->time('start_time')->nullable();
            $table->integer('duration')->nullable();
            $table->string('room_no')->nullable();
            $table->decimal('max_marks', 8, 2)->nullable();
            $table->decimal('min_marks', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_schedules');
    }
};
