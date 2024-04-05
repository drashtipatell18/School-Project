<?php

namespace App\Models\Admin\Expenses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'expenses';
    protected $fillable = ['expenses_head','name','invoice_number','date','amount','attach_document','description'];
}
