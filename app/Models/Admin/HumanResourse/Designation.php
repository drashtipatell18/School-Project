<?php

namespace App\Models\Admin\HumanResourse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $table = 'dasignations';
    protected $fillable = ['name'];
}
