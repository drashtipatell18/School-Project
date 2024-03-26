<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultExam extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $fillable = ['exam_group','exam','class','section','student','subject','marks','grand_total','percent','rank','result'];

}
