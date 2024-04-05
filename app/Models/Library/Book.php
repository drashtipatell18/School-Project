<?php

namespace App\Models\Library;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'books';
    protected $fillable = ['title','bookno','isbnno','publisher','author','subject','rackno','qty','available','price','postdate','description'];
}
