<?php

use Illuminate\Database\Seeder;
// use Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([ 
        	'name' => 'shazzad',
            'email' => 'shazzad.me@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
