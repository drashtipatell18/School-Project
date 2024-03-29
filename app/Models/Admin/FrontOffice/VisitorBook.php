<?php

namespace App\Models\Admin\FrontOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorBook extends Model
{
    use HasFactory;
    protected $table = 'visitor_books';
    protected $fillable = ['purpose','meeting_with','class','section','student','staff','visitor_name','phone','id_card','number_of_person','date','in_time','out_time','attach_document','note'];
}
