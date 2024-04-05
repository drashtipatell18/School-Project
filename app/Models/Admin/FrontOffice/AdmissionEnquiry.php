<?php

namespace App\Models\Admin\FrontOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionEnquiry extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'admission_enquirys';
    protected $fillable = ['name','phone','email','address','description','note','date','next_follow_up_date','assigned','reference','source','class','number_of_child'];
}
