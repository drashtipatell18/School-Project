<?php

namespace App\Models\Admin\FrontOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalDispatch extends Model
{
    use HasFactory;
    protected $table = 'postal_dispatchs';
    protected $fillable = ['to_title','reference_no','address','note','from_title','date','attach_document'];
}
