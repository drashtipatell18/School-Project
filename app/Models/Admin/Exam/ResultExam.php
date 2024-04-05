<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultExam extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'results';
    protected $fillable = ['exam_group','exam','class','section','student','subject','marks','grand_total','percent','rank','result'];

}
