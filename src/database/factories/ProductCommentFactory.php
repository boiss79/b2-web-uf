<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductComment;
use Faker\Generator as Faker;

$factory->define(ProductComment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'rating' => rand(0, 5),
        'product_id' => rand(1,15),
        'user_id' => rand(1,30)
    ];
});
