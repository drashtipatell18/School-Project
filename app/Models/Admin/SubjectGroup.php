<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Clas;
use App\Models\Admin\Subject;

class SubjectGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'subjectgroups';
    protected $fillable = ['name','class','subject','description'];

    public function clas()
    {
        return $this->belongsTo(Clas::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
