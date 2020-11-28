<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Hand Bouquet',
            'category_image' => 'HandBouquet.png'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Wedding Bouquet',
            'category_image' => 'WeddingBouquet.png'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Standing Flower',
            'category_image' => 'StandingFlower.png'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Basket Flower',
            'category_image' => 'BasketFlower.png'
        ]);
    }
}
