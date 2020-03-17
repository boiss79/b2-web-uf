<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchased extends Model
{
    protected $fillable = [
        'name','price','buyer_id','owner_id','token_purchase'
    ];
       
    /**
     * Get the user that owns the product.
    */
    public function owner()
    {
        return $this->belongsTo('App\User','owner_id');
    }
       
    /**
     * Get the user that owns the product.
    */
    public function buyer()
    {
        return $this->belongsTo('App\User','buyer_id');
    }
}
