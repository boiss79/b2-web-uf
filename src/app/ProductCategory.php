<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get products associated with the category.
     */
    public function products(){
        return $this->hasMany('App\Product');
    }
}
