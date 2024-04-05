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
        Schema::create('issueitems', function (Blueprint $table) {
            $table->id();
            $table->string('usertype')->nullable();
            $table->string('issueto')->nullable();
            $table->string('issueby')->nullable();
            $table->date('issuedate')->nullable();
            $table->date('returndate')->nullable();
            $table->string('note')->nullable();
            $table->string('category')->nullable();
            $table->string('item')->nullable();
            $table->string('quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issueitems');
    }
};
