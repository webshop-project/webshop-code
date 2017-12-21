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
        $catList = ['Cap', 'Keycord', 'Mug', 'Phonecase', 'Shirt', 'USB'];

        for ($i = 0; $i < 6; $i++)
        {
            $faker = Faker\Factory::create('nl_NL');

            DB::table('products')->insert([
                'name' => $catList[$i],
                'description' => $faker->sentence(2),
                'img' => $faker->imageUrl($width = 500, $height = 650),
            ]);
        }
    }
}
