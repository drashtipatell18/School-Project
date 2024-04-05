<?php

namespace App\Models\Communicate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'notifications';
    protected $fillable = ['title','noticedate','publishon','attach_document','message','messageto'];
}
