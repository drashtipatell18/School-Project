<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examgroup extends Model
{
    use HasFactory;
    protected $table = 'exam_groups';
    protected $fillable = ['name','exam_type','description'];
}
