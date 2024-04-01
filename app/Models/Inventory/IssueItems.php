<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueItems extends Model
{
    use HasFactory;
    protected $table = 'issueitems';
    protected $fillable = ['usertype','issueto','issueby','issuedate','returndate','note','category','item','quantity'];
}
