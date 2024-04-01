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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('venue')->nullable();
            $table->string('startdate')->nullable();
            $table->string('enddate')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('metatitle')->nullable();
            $table->string('metakeyword')->nullable();
            $table->string('metadescription')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
