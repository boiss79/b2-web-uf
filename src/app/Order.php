<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'reference', 'payment_token', 'total_price', 'user_id'
    ];

    public function productPurchased() {
        return $this->hasMany('App\ProductPurchased', 'order_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
