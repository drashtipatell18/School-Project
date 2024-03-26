<?php

namespace App\Models\Admin\Expenses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesHead extends Model
{
    use HasFactory;
    
    protected $table = 'expenses_head';
    protected $fillable = ['expenses_head','description'];
}
