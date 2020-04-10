<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $table = 'product_rating';

    protected $fillable = [
        'rating','product_id','user_id'
    ];

    /**
     * Get the product associated at this comment.
    */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
   
    /**
     * Get the user associated at this comment.
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
