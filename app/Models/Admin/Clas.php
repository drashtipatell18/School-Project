<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\SubjectGroup;

class Clas extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'class';
    protected $fillable = ['class','section'];

    public function subjectGroups()
    {
        return $this->hasMany(SubjectGroup::class);
    }
}
