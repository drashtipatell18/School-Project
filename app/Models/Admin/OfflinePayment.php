<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfflinePayment extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'offline_payments';
    protected $fillable = ['admissionno','class','section','student','payment_date','submit_date','amount','reference','comment','status','status_date','payment_mode'];

    // public function studentAdmission()
    // {
    //     return $this->belongsTo(StudentAdmission::class, 'student_id', 'id');
    // }
}
