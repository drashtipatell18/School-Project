<?php

namespace App\Models\Admin\Income;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeHead extends Model
{
    use HasFactory;
    protected $table = 'income_heads';
    protected $fillable = ['income_head','description'];
}
