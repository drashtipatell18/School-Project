<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examtype extends Model
{
    use HasFactory;
    protected $table = 'exam_type';
    protected $fillable = ['exam_type'];
}
