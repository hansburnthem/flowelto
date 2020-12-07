<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('detail_transactions')->insert([
            'transaction_id' => '1',
            'flower_id' => '1',
            'quantity' => '1'
        ]);

        DB::table('detail_transactions')->insert([
            'transaction_id' => '2',
            'flower_id' => '2',
            'quantity' => '2'
        ]);
    }
}
