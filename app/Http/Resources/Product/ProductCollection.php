<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an ar    sssray.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'total_price' => round((1 - ($this->discount/100)) * $this->price,2),
            'rating' => $this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),2)
                :'No rating yet' ,
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
