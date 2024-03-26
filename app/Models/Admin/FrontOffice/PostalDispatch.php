<?php

namespace App\Models\Admin\FrontOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalDispatch extends Model
{
    use HasFactory;
    protected $table = 'postal_dispatchs';
    protected $fillable = ['from_title','reference_no','address','note','to_title','date','attach_document'];
}
