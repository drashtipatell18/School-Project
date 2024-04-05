<?php

namespace App\Models\Admin\HumanResourse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffDirectory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'staff_directorys';
    protected $fillable = ['staff_id','role','designation','department','first_name','last_name','father_name','mother_name','email','gender','date_of_birth','date_of_joining','phone','emergency_contact_number','photo','address','permanent_address','qualification','work_experience','note','pan_number','epf_number','basic_salary','work_shift','work_location','bank_account_title','bank_account_number','bank_name','ifsc_code','bank_branch_name','facebook_url','twitter_url','linkedin_url','instagram_url','resume','joining_letter','resignation_letter','other_documents'];
}
