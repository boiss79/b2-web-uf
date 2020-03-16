<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchased extends Model
{
    protected $fillable = [
        'name','price','buyer_id','owner_id','token_purchase'
    ];
}
