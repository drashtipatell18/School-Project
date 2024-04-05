<?php

namespace App\Models\Admin\HumanResourse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApproveLeaveRequest extends Model
{
    use HasFactory;
    use SoftDeletes;    
    protected $table = 'approve_leave_requests';
    protected $fillable = ['role','name','apply_date','leave_type','leave_from_date','leave_to_date','reason','note','attach_document','status'];
}
