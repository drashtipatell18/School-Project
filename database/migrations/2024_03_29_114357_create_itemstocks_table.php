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
        Schema::create('itemstocks', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('item')->nullable();
            $table->string('supplier')->nullable();
            $table->string('store')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->date('date')->nullable();
            $table->string('attach_document')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemstocks');
    }
};
