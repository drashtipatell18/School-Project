<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'exam_schedules';
    protected $fillable = ['exam_group','exam','subject','date_from','start_time','duration','room_no','max_marks','min_marks'];
}
