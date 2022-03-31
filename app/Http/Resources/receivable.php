<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class receivable extends JsonResource
{
    public function toArray($request)
    {
        return [
            'receivable_id'=>$this->receivable_id,
            'payment_id '=>$this->payment_id,
            'client_id '=>$this->client_id,
            'sale_id '=>$this->sale_id,
            'date_sale'=>$this->date_sale,
            'date_paymentreceivable'=>$this->date_paymentreceivable,
            'status'=>$this->status,
            'value'=>$this->value,
            'value_receivable'=>$this->value_receivable,
            'date_duereceivable'=>$this->date_duereceivable,
            'numberplot'=>$this->numberplot,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
