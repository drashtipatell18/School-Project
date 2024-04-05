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
        Schema::create('staff_directorys', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('role')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('phone')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('photo')->nullable();
            $table->text('address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('qualification')->nullable();
            $table->string('work_experience')->nullable();
            $table->text('note')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('epf_number')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('work_shift')->nullable();
            $table->text('work_location')->nullable();
            $table->string('bank_account_title')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_branch_name')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('resume')->nullable();
            $table->string('joining_letter')->nullable();
            $table->string('resignation_letter')->nullable();
            $table->string('other_documents')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_directorys');
    }
};
