<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $housesList = ['Variable Vikings', 'Database Dragons', 'Recursive Ravens', 'Script Serpents'];
        $catList = ['Cap', 'Keycord', 'Mug', 'Phonecase', 'Shirt', 'USB'];
        $modelsList = ['normal','polo','7S','8S','Note','7S','X'];

        $faker = Faker\Factory::create('nl_NL');
        for ( $i = 0; $i < count($housesList); $i++)
        {
            for ( $j = 0; $j < count($catList); $j++)
            {
                if( $j == 3)
                {
                    for($l = 0; $l < 3; $l++)
                    {
                        DB::table('product')->insert
                        (
                            [
                                'house_id'      => $i,
                                'category_id'   => $j,
                                'model_id'      => $l,
                                'description'   => $faker->sentence(6),
                                'img'           =>
                            ]
                        );

                    }
                }
            }
        }
    }
}
