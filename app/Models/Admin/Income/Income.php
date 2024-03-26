<?php

namespace App\Models\Admin\Income;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    
    protected $table = 'incomes';
    protected $fillable = ['income_head','name','invoice_number','date','amount','attach_document','description'];
}
