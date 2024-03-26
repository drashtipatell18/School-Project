<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homework extends Model
{
    use HasFactory; 
    use SoftDeletes;
    protected $table = 'homeworks';
    protected $fillable = [
        'class',
        'section',
        'subject',
        'homework_date',
        'submission_date',
        'note',
        'status',
    ];
}
