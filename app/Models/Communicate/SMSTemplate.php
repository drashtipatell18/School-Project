<?php

namespace App\Models\Communicate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSTemplate extends Model
{
    use HasFactory;
    protected $table = 'sms_templates';
    protected $fillable = ['title','attach_document','message'];
}
