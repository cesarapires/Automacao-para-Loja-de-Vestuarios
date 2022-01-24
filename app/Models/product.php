<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'name',
        'color',
        'type_id',
        'size_id',
        'price_buy',
        'price_sell',
        'date_buy',
        'stock',
    ];

    public function type()
    {
        return $this->hasOne(type::class, 'type_id', 'type_id');
    }
    public function size()
    {
        return $this->hasOne(size::class, 'size_id', 'size_id');
    }
}
