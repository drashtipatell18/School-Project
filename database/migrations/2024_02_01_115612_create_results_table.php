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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('exam_group')->nullable();
            $table->string('exam')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('student')->nullable();
            $table->string('subject')->nullable();
            $table->string('marks')->nullable();
            $table->integer('grand_total')->nullable();
            $table->string('percent')->nullable();
            $table->string('rank')->nullable();
            $table->string('result')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
