<?php

namespace App\Models\Communicate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendSMS extends Model
{
    use HasFactory;
    protected $table = 'sms';
    protected $fillable = ['template','title','send_through','message','group','individual','individual_name','class','section'];
}
