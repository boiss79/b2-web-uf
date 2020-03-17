<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * Get products associated with the user.
     */
    public function products(){
        return $this->hasMany('App\Product','owner_id');
    }

    /**
     * Get products associated with the user.
     */
    public function productsPurchaseds(){
        return $this->hasMany('App\Product','owner_id');
    }

    /**
     * Get the comments associated at this user.
    */
    public function userComments()
    {
        return $this->hasMany('App\ProductComment','user_id');
    }

    /**
     * Get the ratings associated at this user.
    */
    public function userRatings()
    {
        return $this->hasMany('App\ProductRating','user_id');
    }
}
