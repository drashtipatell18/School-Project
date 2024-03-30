<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
    use HasFactory;
    protected $table = 'itemstocks';
    protected $fillable = ['category','item','supplier','store','quantity','price','date','attach_document','description'];
}
