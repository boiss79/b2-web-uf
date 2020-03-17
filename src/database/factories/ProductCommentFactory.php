<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductComment;
use Faker\Generator as Faker;

$factory->define(ProductComment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'product_id' => rand(1,15),
        'user_id' => rand(1,30)
    ];
});
