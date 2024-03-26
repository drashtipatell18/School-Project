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
        Schema::create('postal_dispatchs', function (Blueprint $table) {
            $table->id();
            $table->string('from_title')->nullable();
            $table->string('reference_no')->nullable();
            $table->text('address')->nullable();
            $table->text('note')->nullable();
            $table->string('to_title')->nullable();
            $table->date('date')->nullable();
            $table->string('attach_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postal_dispatchs');
    }
};
