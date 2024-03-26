<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGrade extends Model
{
    use HasFactory;
    protected $table = 'marks_grades';
    protected $fillable = ['exam_type','grade_name','percent_from','percent_upto','grade_point','description'];
}
