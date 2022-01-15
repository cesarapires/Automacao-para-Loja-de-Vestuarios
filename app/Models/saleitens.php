<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saleitens extends Model
{
    protected $fillable = [
        'saleitens_id',
        'sale_id', 
        'product_id',
        'name',
        'quantity', 
        'price', 
        'subtotal', 
        'created_at', 
        'updated_at',
    ];
}
