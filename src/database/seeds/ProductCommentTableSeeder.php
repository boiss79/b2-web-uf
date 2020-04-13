<?php

use Illuminate\Database\Seeder;

class ProductCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductComment::class, 60)->create();
    }
}
