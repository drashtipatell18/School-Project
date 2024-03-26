<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approveleave extends Model
{
    use HasFactory;
    protected $table = 'approve_leaves';
    protected $fillable = [
        'class',
        'section',
        'student',
        'apply_date',
        'from_date',
        'to_date',
        'reason',
        'status',
    ];
}
