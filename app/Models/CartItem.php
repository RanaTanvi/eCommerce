<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'product_image',
        'quantity',
        'price',
        'total'
    ];
}
