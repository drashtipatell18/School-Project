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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('template')->nullable();
            $table->string('title')->nullable();
            $table->string('attach_document')->nullable();
            $table->string('message')->nullable();
            $table->string('group')->nullable();
            $table->string('individual')->nullable();
            $table->string('individual_name')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
