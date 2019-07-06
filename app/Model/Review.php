<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['product_id','customer','review','star'];

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
