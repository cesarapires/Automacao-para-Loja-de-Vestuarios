<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receivable extends Model
{
    protected $fillable = [
        'receivable_id',
        'payment_id ',
        'client_id ',
        'sale_id ',
        'date_sale',
        'date_paymentreceivable',
        'status',
        'value',
        'value_receivable',
        'date_duereceivable',
        'numberplot',
        'created_at',
        'updated_at',
    ];
}
