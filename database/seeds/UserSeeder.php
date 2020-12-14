<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'role_id'=>'1',
                'username'=>'Big Boss',
                'email'=>'big@gmail.com',
                'address'=>'Jakarta Barat',
                'gender'=>'male',
                'dob'=>Carbon::today(),
                'password'=>Hash::make('123123123'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'role_id'=>'2',
                'username'=>'Any',
                'email'=>'any@gmail.com',
                'address'=>'Jakarta Selatan',
                'gender'=>'female',
                'dob'=>Carbon::today(),
                'password'=>Hash::make('123123123'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
