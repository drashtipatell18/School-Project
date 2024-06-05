<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\SubjectGroup;
    
class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'subjects';
    protected $fillable = ['code','name','subject_type'];

    public function subjectGroup()
    {
        return $this->belongsTo(SubjectGroup::class);
    }
}
