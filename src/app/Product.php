<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','price','url_sheet','category_id','owner_id'
    ];

    
    /**
     * Get the user that owns the product.
     
    *public function user()
    *{
    *    return $this->belongsTo('App\User','owner_id');
    *}
    */
    
    /**
     * Get the user that owns the product.
     *
    *public function category()
    *{
    *    return $this->belongsTo('App\Category');
    *}
    */

}
