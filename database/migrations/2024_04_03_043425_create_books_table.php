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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('bookno')->nullable();
            $table->string('isbnno')->nullable();
            $table->string('publisher')->nullable();
            $table->string('author')->nullable();
            $table->string('subject')->nullable();
            $table->string('rackno')->nullable();
            $table->string('qty')->nullable();
            $table->string('available')->nullable();
            $table->string('price')->nullable();
            $table->date('postdate')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
