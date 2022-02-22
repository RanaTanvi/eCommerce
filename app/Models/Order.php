<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'order_items', 'order_id', 'product_id');
    }
}
