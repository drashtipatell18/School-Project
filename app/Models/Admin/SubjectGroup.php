<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGroup extends Model
{
    use HasFactory;
    protected $table = 'subjectgroups';
    protected $fillable = ['name','class','section','subject','description'];
}
