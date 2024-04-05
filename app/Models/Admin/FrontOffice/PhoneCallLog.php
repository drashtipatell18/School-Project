<?php

namespace App\Models\Admin\FrontOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneCallLog extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'phone_call_logs';
    protected $fillable = ['name','phone','date','description','next_follow_up_date','next_follow_up_date','call_duration','note','call_type'];
}
