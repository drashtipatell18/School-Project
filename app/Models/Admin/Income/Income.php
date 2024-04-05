<?php

namespace App\Models\Admin\Income;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'incomes';
    protected $fillable = ['income_head','name','invoice_number','date','amount','attach_document','description'];
}
