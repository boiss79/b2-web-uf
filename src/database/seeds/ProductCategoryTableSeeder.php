<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['Mathématiques','Français','Physique-Chimie','SVT','Anglais'];
        foreach($category as $cat){
            DB::table('product_categories')->insert([
                'name' => $cat
            ]);
        }
    }
}
