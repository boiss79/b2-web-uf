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
        return $this->hasMany('App\Product', 'category_id');
    }

    public function approvedProducts() {
        return $this->products()->whereNotNull('published_at')->orderBy('created_at', 'DESC');
    }

    public function threeProducts(){
        return $this->approvedProducts()->limit(3);
    }

    public function getRouteKeyName() {
        return 'name';
    }
}
