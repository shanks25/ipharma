<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert([ 
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomDigitNotNull,
            ]);
        }
    }
}
