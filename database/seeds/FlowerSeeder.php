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
            'flower_name' => 'Beauty Roses',
            'flower_price' => '305000',
            'flower_desc' => 'Roses is a favorite flower to give',
            'flower_img' => 'assets/categories/hands/hand_1.jpg/'
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Rouge Eclatant',
            'flower_price' => '540000',
            'flower_desc' => 'Rouge Eclatant is the best flower for your parent',
            'flower_img' => 'assets/categories/hands/hand_2.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Purple Floe',
            'flower_price' => '740000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/hands/hand_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Fleurs Joyeuses',
            'flower_price' => '700000',
            'flower_desc' => 'Flower for your little sister or brother :)',
            'flower_img' => 'assets/categories/hands/hand_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Lamour Vrai',
            'flower_price' => '290000',
            'flower_desc' => 'Full of love for your love',
            'flower_img' => 'assets/categories/hands/hand_1.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Rainbow Floe',
            'flower_price' => '740000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/hands/hand_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Fleurs Mignonnes',
            'flower_price' => '700000',
            'flower_desc' => 'Flower for your little sister or brother :)',
            'flower_img' => 'assets/categories/hands/hand_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '1',
            'flower_name' => 'Lamour',
            'flower_price' => '290000',
            'flower_desc' => 'Full of love for your love',
            'flower_img' => 'assets/categories/hands/hand_5.jpg/',
        ]);

        //-----------------------WEDDING BOUQUET---------------------------
        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Beauty Roses',
            'flower_price' => '355000',
            'flower_desc' => 'Roses is a favorite flower to give',
            'flower_img' => 'assets/categories/wedding/wedding_1.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Magie Magique',
            'flower_price' => '540000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/wedding/wedding_2.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Yellow Floe',
            'flower_price' => '740000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/wedding/wedding_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Captivers',
            'flower_price' => '740000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/wedding/wedding_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Magic Magiq',
            'flower_price' => '540000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/wedding/wedding_5.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Yellow Floe',
            'flower_price' => '740000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/wedding/wedding_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Beauty Roses',
            'flower_price' => '305000',
            'flower_desc' => 'Roses is a favorite flower to give',
            'flower_img' => 'assets/categories/wedding/wedding_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '2',
            'flower_name' => 'Magie Magique',
            'flower_price' => '540000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/wedding/wedding_5.jpg/',
        ]);

        //-----------------------STANDING FLOWERS---------------------------
        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Beauty Roses',
            'flower_price' => '505000',
            'flower_desc' => 'Roses is a favorite flower to give',
            'flower_img' => 'assets/categories/stands/stand_1.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Magie Magique',
            'flower_price' => '642000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/stands/stand_2.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Captivers',
            'flower_price' => '715000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/stands/stand_3.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Yellow Fls',
            'flower_price' => '629000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/stands/stand_4.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Blue Magic',
            'flower_price' => '321000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/stands/stand_5.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Magie Magique',
            'flower_price' => '642000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/stands/stand_2.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Yellow Fls',
            'flower_price' => '629000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/stands/stand_4.jpg',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '3',
            'flower_name' => 'Blue Magic',
            'flower_price' => '321000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/stands/stand_5.jpg',
        ]);


        //-----------------------BASKET FLOWERS---------------------------
        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Red n White',
            'flower_price' => '305000',
            'flower_desc' => 'Red and White is a favorite flower to give',
            'flower_img' => 'assets/categories/basket/basket_1.jpg/'
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Blue Magic',
            'flower_price' => '540000',
            'flower_desc' => 'Blue Magic is the best flower for your parent',
            'flower_img' => 'assets/categories/basket/basket_2.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Rainbow Floe',
            'flower_price' => '740000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/basket/basket_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Fleurs Mign',
            'flower_price' => '700000',
            'flower_desc' => 'Flower for your little sister or brother :)',
            'flower_img' => 'assets/categories/basket/basket_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Lamour vrai',
            'flower_price' => '290000',
            'flower_desc' => 'Full of love for your love',
            'flower_img' => 'assets/categories/basket/basket_5.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Rainbow Floe',
            'flower_price' => '740000',
            'flower_desc' => 'A sprinkling of loving color to your partner',
            'flower_img' => 'assets/categories/basket/basket_3.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Fleurs Mignonnes',
            'flower_price' => '700000',
            'flower_desc' => 'Flower for your little sister or brother :)',
            'flower_img' => 'assets/categories/basket/basket_4.jpg/',
        ]);

        DB::table('flowers')->insert([
            'flower_category_id' => '4',
            'flower_name' => 'Lamour vrai',
            'flower_price' => '290000',
            'flower_desc' => 'Full of love for your love',
            'flower_img' => 'assets/categories/basket/basket_5.jpg/',
        ]);
    }
}
