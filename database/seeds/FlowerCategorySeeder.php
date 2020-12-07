<?php

use Illuminate\Database\Seeder;
use App\FlowerCategory;
use Carbon\Carbon;


class FlowerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FlowerCategory::insert([
            [
                'category_name' => 'Hand Bouquet',
                'category_img' => 'assets/categories/HandBouquet.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'category_name' => 'Wedding Bouquet',
                'category_img' => 'assets/categories/WeddingBouquet.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'category_name' => 'Standing Flower',
                'category_img' => 'assets/categories/StandingFlower.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'category_name' => 'Basket Flower',
                'category_img' => 'assets/categories/BasketFlower.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
