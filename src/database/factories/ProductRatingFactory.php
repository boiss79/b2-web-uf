<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductRating;
use Faker\Generator as Faker;

$factory->define(ProductRating::class, function (Faker $faker) {
    return [
        'rating' => rand(1,5),
        'product_id' => rand(1,15),
        'user_id' => rand(1,30)
    ];
});
