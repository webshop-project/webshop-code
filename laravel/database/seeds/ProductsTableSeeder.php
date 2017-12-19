<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('nl_NL');

        $catList = ['Cap', 'Keycord', 'Mug', 'Phonecase', 'Shirt', 'USB'];

        for ($z = 0; $z < 10; $z++) {
            $faker = Faker\Factory::create('nl_NL');

            for ($i = 0; $i < 6; $i++) {
                DB::table('products')->insert([
                    'name' => $catList[$i],
                    'description' => $faker->sentence(2),
                    'img' => $faker->imageUrl($width = 500, $height = 650),
                    'viewamount' => random_int(5, 120),
                ]);
            }
        }
    }
}
