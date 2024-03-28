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
        Schema::create('visitor_books', function (Blueprint $table) {
            $table->id();
            $table->string('purpose')->nullable();
            $table->string('meeting_with')->nullable();
            $table->string('visitor_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('id_card')->nullable();
            $table->string('number_of_person')->nullable();
            $table->date('date')->nullable();
            $table->date('in_time')->nullable();
            $table->date('out_time')->nullable();
            $table->string('attach_document')->nullable();
            $table->text('note')->nullable()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_books');
    }
};
