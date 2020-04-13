<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchased extends Model
{
    protected $table = 'product_purchased';

    protected $fillable = [
        'name','description','price','url_sheet','category_id','owner_id', 'order_id', 'product_id', 'buyer_id', 'published_at'
    ];
       
    /**
     * Get the user that owns the product.
    */
    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
       
    /**
     * Get the user that owns the product.
    */
    public function orders()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
}
