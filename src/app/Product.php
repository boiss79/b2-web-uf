<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'name','description','price','url_sheet','category_id','owner_id', 'published_at'
    ];

    
    /**
     * Get the user that owns the product.
    */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Get the category that owns the product.
    */
    public function categories()
    {
        return $this->belongsTo('App\ProductCategory', 'category_id');
    }
    
    /**
     * Get the comments associated at this product.
    */
    public function comments()
    {
        return $this->hasMany('App\ProductComment', 'product_id');
    }

}
