<?php

use Illuminate\Database\Seeder;
use App\Flower;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-----------------------HAND BOUQUET---------------------------
        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 1',
            'flower_price' => '10000',
            'flower_desc' => 'Hand 1',
            'flower_img' => 'assets/categories/hands/hand_1.jpg/'
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 2',
            'flower_price' => '1000000',
            'flower_desc' => 'Hand 2',
            'flower_img' => 'assets/categories/hands/hand_2.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 3',
            'flower_price' => '1000000',
            'flower_desc' => 'Hand 3',
            'flower_img' => 'assets/categories/hands/hand_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 4',
            'flower_price' => '1000000',
            'flower_desc' => 'Hand 4',
            'flower_img' => 'assets/categories/hands/hand_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 5',
            'flower_price' => '1000000',
            'flower_desc' => 'Hand 5',
            'flower_img' => 'assets/categories/hands/hand_5.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 6',
            'flower_price' => '1000000',
            'flower_desc' => 'Hand 6',
            'flower_img' => 'assets/categories/hands/hand_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 7',
            'flower_price' => '1000000',
            'flower_desc' => 'Hand 7',
            'flower_img' => 'assets/categories/hands/hand_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Hand 8',
            'flower_price' => '1000000',
            'flower_desc' => 'Hand 8',
            'flower_img' => 'assets/categories/hands/hand_5.jpg/',
        ]);

        //-----------------------WEDDING BOUQUET---------------------------
        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 1',
            'flower_price' => '2000000',
            'flower_desc' => 'Wedding 1',
            'flower_img' => 'assets/categories/wedding/wedding_1.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 2',
            'flower_price' => '2000000',
            'flower_desc' => 'Wedding 2',
            'flower_img' => 'assets/categories/wedding/wedding_2.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 3',
            'flower_price' => '20000',
            'flower_desc' => 'Wedding 3',
            'flower_img' => 'assets/categories/wedding/wedding_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 4',
            'flower_price' => '20000',
            'flower_desc' => 'Wedding 4',
            'flower_img' => 'assets/categories/wedding/wedding_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 5',
            'flower_price' => '20000',
            'flower_desc' => 'Wedding 5',
            'flower_img' => 'assets/categories/wedding/wedding_5.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 6',
            'flower_price' => '20000',
            'flower_desc' => 'Wedding 6',
            'flower_img' => 'assets/categories/wedding/wedding_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 7',
            'flower_price' => '20000',
            'flower_desc' => 'Wedding 7',
            'flower_img' => 'assets/categories/wedding/wedding_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Wedding 8',
            'flower_price' => '20000',
            'flower_desc' => 'Wedding 8',
            'flower_img' => 'assets/categories/wedding/wedding_5.jpg/',
        ]);

        //-----------------------STANDING FLOWERS---------------------------
        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 1',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 1',
            'flower_img' => 'assets/categories/stands/stand_1.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 2',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 2',
            'flower_img' => 'assets/categories/stands/stand_2.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 3',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 3',
            'flower_img' => 'assets/categories/stands/stand_3.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 4',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 4',
            'flower_img' => 'assets/categories/stands/stand_4.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 5',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 5',
            'flower_img' => 'assets/categories/stands/stand_5.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 6',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 6',
            'flower_img' => 'assets/categories/stands/stand_3.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 7',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 7',
            'flower_img' => 'assets/categories/stands/stand_4.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Standing 8',
            'flower_price' => '20000',
            'flower_desc' => 'Standing 8',
            'flower_img' => 'assets/categories/stands/stand_5.jpg',
        ]);


        //-----------------------BASKET FLOWERS---------------------------
        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 1',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 1',
            'flower_img' => 'assets/categories/basket/basket_1.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 2',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 2',
            'flower_img' => 'assets/categories/basket/basket_2.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 3',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 3',
            'flower_img' => 'assets/categories/basket/basket_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 4',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 4',
            'flower_img' => 'assets/categories/basket/basket_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 5',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 5',
            'flower_img' => 'assets/categories/basket/basket_5.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 6',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 6',
            'flower_img' => 'assets/categories/basket/basket_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 7',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 7',
            'flower_img' => 'assets/categories/basket/basket_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Basket 8',
            'flower_price' => '20000',
            'flower_desc' => 'Basket 8',
            'flower_img' => 'assets/categories/basket/basket_5.jpg/',
        ]);
    }
}
