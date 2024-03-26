<?php

namespace App\Models\Admin\FrontOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purpose extends Model
{
    use HasFactory;
    
    protected $table = 'purposes';
    protected $fillable = ['purpose','description'];
}
