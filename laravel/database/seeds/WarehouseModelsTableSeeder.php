<?php

use Illuminate\Database\Seeder;

class WarehouseModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelsList = ['7S','8S','Note','7S','X'];
        $catList = ['Cap', 'Keycord', 'Mug', 'Phonecase', 'Shirt', 'USB'];
        $housesList = ['Variable Vikings', 'Database Dragons', 'Recursive Ravens', 'Script Serpents'];
        $sizeList = ['s', 'm', 'l', 'xl', '8', '16', '32', '64'];
        $faker = Faker\Factory::create('nl_NL');

        for ($i = 0; $i < count($housesList); $i++)
        {
            for ($j = 0; $j < count($catList); $j++)
            {
                if($j == 3)
                {
                    for($l = 0; $l < count($modelsList); $l++)
                    {
                        DB::table('warehouse')->insert
                        (
                            [
                                //phonecase
                                'house_id'      => $i + 1,
                                'category_id'   => $j + 1,
                                'model_id'      => $l + 1,
                                'supply'        => random_int(0,25),
                                'price'         => random_int(5,25),
                                'viewAmount'    => random_int(5, 120),
                                'img'           => $faker->imageUrl($width = 500, $height = 650),
                                'description' => $faker->sentence(2),
                            ]
                        );
                    }
                }
                else if ($j == 4)
                {
                    for ($k = 0; $k < (count($sizeList) - 4) ; $k++) {

                        DB::table('warehouse')->insert
                        (
                            [
                                //usb
                                'house_id'      => $i + 1,
                                'category_id'   => $j + 1,
                                'size_id'       => $k + 1,
                                'supply'        => random_int(0,25),
                                'price'         => random_int(5,25),
                                'viewAmount'    => random_int(5, 120),
                                'img'           => $faker->imageUrl($width = 500, $height = 650),
                                'description'   => $faker->sentence(2),
                            ]
                        );
                    }
                } else if ($j == 5) {
                    for ($q = 4; $q <= count($sizeList); $q++) {
                        DB::table('warehouse')->insert
                        (
                            [
                                //tshirts
                                'house_id'      => $i + 1,
                                'category_id'   => $j + 1,
                                'size_id'       => $q,
                                'supply'        => random_int(0,25),
                                'price'         => random_int(5,25),
                                'viewAmount'    => random_int(5, 120),
                                'img'           => $faker->imageUrl($width = 500, $height = 650),
                                'description' => $faker->sentence(2),
                            ]
                        );
                    }
                } else {
                    DB::table('warehouse')->insert
                    (
                        [
                            'house_id'      => $i + 1,
                            'category_id'   => $j + 1,
                            'supply'        => random_int(0,25),
                            'price'         => random_int(5,25),
                            'viewAmount'    => random_int(5, 120),
                            'img'           => $faker->imageUrl($width = 500, $height = 650),
                            'description' => $faker->sentence(2),
                        ]
                    );
                }
            }
        }
    }
}
