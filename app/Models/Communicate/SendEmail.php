<?php

namespace App\Models\Communicate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendEmail extends Model
{
    use HasFactory;
    protected $table = 'emails';
    protected $fillable = ['template','title','attach_document','message','group','individual','individual_name','class','section'];
}
