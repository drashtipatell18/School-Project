<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approveleave extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
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
