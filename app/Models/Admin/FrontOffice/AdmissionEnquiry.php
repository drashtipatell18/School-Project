<?php

namespace App\Models\Admin\FrontOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionEnquiry extends Model
{
    use HasFactory;
    protected $table = 'admission_enquirys';
    protected $fillable = ['name','phone','email','address','description','note','date','next_follow_up_date','assigned','reference','sourse','class','number_of_child'];
}
