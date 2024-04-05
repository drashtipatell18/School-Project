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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_type')->nullable();
            $table->string('source')->nullable();
            $table->string('complain_by')->nullable();
            $table->string('phone')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->string('action_taken')->nullable();
            $table->string('assigned')->nullable();
            $table->text('note')->nullable();
            $table->string('attach_document')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
