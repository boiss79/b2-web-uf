<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'description', 'url_picture', 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute() {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get products associated with the user.
     */
    public function products() {
        return $this->hasMany('App\Product', 'owner_id');
    }

    /**
     * Return the number of its product
     *
     * @return int
    */ 
    public function nbProducts() {
        $products = $this->hasMany('App\Product', 'owner_id');
        return $products->count();
    }

    /**
     * Get products associated with the user.
     */
    public function productPurchased() {
        return $this->hasMany('App\ProductPurchased', 'owner_id');
    }

    /**
     * Get the comments associated at this user.
    */
    public function comments()
    {
        return $this->hasMany('App\ProductComment','user_id');
    }

    /**
     * Get the ratings associated at this user.
    */
    public function productRating()
    {
        return $this->hasMany('App\ProductRating','user_id');
    }

    public function orders() {
        return $this->hasMany('App\Order', 'user_id');
    }
}
