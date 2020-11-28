<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flowers')->insert([
            'category_id' => '1',
            'flower_name' => 'Flower 1',
            'flower_price' => '10000',
            'flower_description' => 'Flower 1',
            'flower_image' => 'flower.jpg',
        ]);

        DB::table('flowers')->insert([
            'category_id' => '2',
            'flower_name' => 'Flower 2',
            'flower_price' => '20000',
            'flower_description' => 'Flower 2',
            'flower_image' => 'flower.jpg',
        ]);
    }
}
