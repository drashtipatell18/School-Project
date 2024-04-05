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
        Schema::create('approve_leave_requests', function (Blueprint $table) {
            $table->id();
            $table->string('role')->nullable();
            $table->string('name')->nullable();
            $table->date('apply_date')->nullable();
            $table->string('leave_type')->nullable();
            $table->date('leave_from_date')->nullable();
            $table->date('leave_to_date')->nullable();
            $table->text('reason')->nullable();
            $table->text('note')->nullable();
            $table->string('attach_document')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approve_leave_requests');
    }
};
