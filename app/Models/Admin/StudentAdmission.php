<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    use HasFactory;
    protected $table = 'student_addmissions';

    protected $fillable = [
        'admissionno', 'rollnumber', 'class', 'section', 'first_name', 'last_name',
        'email', 'phone', 'gender', 'date_of_birth', 'category', 'religion', 'caste',
        'admission_date', 'student_photo', 'blood_group', 'height', 'weight',
        'medical_history', 'address', 'father_name', 'father_phone', 'father_occupation',
        'father_photo', 'mother_name', 'mother_phone', 'mother_occupation', 'mother_photo',
    ];

    // public function offlinePayments()
    // {
    //     return $this->hasMany(OfflinePayment::class, 'student_id', 'id');
    // }

}
