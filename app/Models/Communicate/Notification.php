<?php

namespace App\Models\Communicate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = ['title','noticedate','publishon','attach_document','message','messageto'];
}
