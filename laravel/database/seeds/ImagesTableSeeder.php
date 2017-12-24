<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('nl_NL');

        for ($i = 0; $i <= 70; $i++)
        {
            DB::table('images')->insert([
                'img' => '/img/cap_serpent_back.png',
                'product_id' => $i+1,
            ]);
        }
    }
}
