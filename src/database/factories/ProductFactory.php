<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10)." €",
        'url_sheet' =>'www.google.com',
        'category_id' => rand(1,5),
        'owner_id' => rand(1,30)
    ];
});
