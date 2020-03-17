<?php

use Illuminate\Database\Seeder;

class ProductRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductRating::class, 60)->create();
    }
}
