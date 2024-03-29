<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAssign extends Model
{
    use HasFactory;
    protected $table = 'teacher_assgin';
    protected $fillable = ['class','section','teacher'];
}
