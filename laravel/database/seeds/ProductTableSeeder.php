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
        $modelsListSamsung = ['7S','8S','Note'];
        $modelsListIphone = ['7S','X'];
        $modelsListShirt = ['normal','polo'];
        $faker = Faker\Factory::create('nl_NL');
        for ( $i = 0; $i < count($housesList); $i++)
        {
            for ( $j = 0; $j < count($catList); $j++)
            {
                if( $j == 3)
                {
                    for($l = 0 + count($modelsListShirt);
                        $l < count($modelsListSamsung) + count($modelsListIphone) + count($modelsListShirt);
                        $l++)
                    {
                        if($l > count($modelsListSamsung) )
                        {
                            //SamsungModels
                            DB::table('products')->insert
                            (
                                [
                                    'house_id'          => $i + 1,
                                    'category_id'       => $j + 1,
                                    'brand_model_id'    => $l + 1,
                                    'description'       => $faker->sentence(6),
                                    'img'               => '/img/cap_serpent_front.png',
                                    'viewAmount'        => random_int(0,25),
                                ]
                            );
                        }
                        else
                        {
                            //IphoneModels
                            DB::table('products')->insert
                            (
                                [
                                    'house_id'          => $i + 1,
                                    'category_id'       => $j + 1,
                                    'brand_model_id'    => $l + 1,
                                    'description'       => $faker->sentence(6),
                                    'img'               => '/img/cap_serpent_front.png',
                                    'viewAmount'        => random_int(0,25),
                                ]
                            );
                        }
                    }
                }
                elseif ($j == 4)
                {
                    for($l = 0; $l < count($modelsListShirt); $l++)
                    {
                        //Shirt
                        DB::table('products')->insert
                        (
                            [
                                'house_id'            => $i + 1,
                                'category_id'         => $j + 1,
                                'brand_model_id'      => $l + 1,
                                'description'         => $faker->sentence(6),
                                'img'                 => '/img/cap_serpent_front.png',
                                'viewAmount'          => random_int(0,25),
                            ]
                        );
                    }
                }
                else
                {
                    DB::table('products')->insert
                    (
                        [
                            'house_id'      => $i + 1,
                            'category_id'   => $j + 1,
                            'description'   => $faker->sentence(6),
                            'img'           => '/img/cap_serpent_front.png',
                            'viewAmount'    => random_int(0,25),
                        ]
                    );
                }
            }
        }
    }
}
