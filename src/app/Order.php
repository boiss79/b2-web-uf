<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'reference', 'payment_token', 'total_price', 'user_id'
    ];
}
