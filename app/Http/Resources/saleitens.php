<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class saleitens extends JsonResource
{
    public function toArray($request)
    {
        return [
            'saleitens_id'=>$this->saleitens_id,
            'sale_id'=>$this->sale_id, 
            'product_id'=>$this->product_id, 
            'name'=>$this->name,
            'quantity'=>$this->quantity, 
            'price'=>$this->price, 
            'subtotal'=>$this->subtotal, 
            'created_at'=>$this->created_at, 
            'updated_at'=>$this->updated_at
        ];
    }
}
'saleitens_id',
        'sale_id', 
        'product_id', 
        'quantity', 
        'price', 
        'subtotal', 
        'created_at', 
        'updated_at',