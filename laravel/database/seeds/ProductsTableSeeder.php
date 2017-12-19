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

        $modelsList = ['7S','8S','Note'];
        $catList = ['Cap','Keycord','Mug','Phonecase','Shirt','USB'];
        $housesList = ['Variable Vikings','Database Dragons','Recursive Ravens','Script Serpents'];
        $gbList = ['4','8','16','32','64'];
        $brandsList = ['Samsung'];
        //$brandsList = \App\brand::all();

//        foreach($brandsList as $key => $value){
//
//        }
for ( $z = 0 ; $z < 10 ; $z++)
{

        for( $i = 0 ; $i < count($housesList); $i++ )
        {
            $houseID = 1;
            $bmodelID = 0;
            $storageID = 0;
            $catCounter = 1;
            for ( $j = 0 ; $j < count($catList) ; $j++ )
            {

                $brandID = 0;
                if($j == 3)
                {
                    $brandID = 1;
                    for ( $k = 0; $k < count($brandsList) ; $k++ )
                    {
//                        $brand = \App\brand::find($k);


                        for ($l = 0; $l < count($modelsList) ; $l++)
                        {
                            DB::table('products')->insert
                            (

                                [
                                    'house_id' => $i+1,
                                    'category_id' => $catCounter,
                                    'brand_id' => $brandID,
                                    'b_model_id' => $l+1,
                                    'discount' => 0,
                                    'name' => $housesList[$i] . " " . $catList[$j] ." ". $brandsList[$k] ." " . $modelsList[$l],
                                    'price' => mt_rand (10*10, 100*10) / 10,
                                    'description' => $faker->sentence(12),
                                    'viewAmount' => rand(0,150),
                                    'img' => $faker->imageUrl($width = 500, $height = 650),
                                ]
                            );
                        }

                    }
                }
                else if($j == 4)
                {
                    for ( $q = 0 ; $q < count($gbList) ; $q++ )
                    {
                        $brandID = 0;
                        $bmodelID = 0;
                        DB::table('products')->insert
                        (
                            [
                                'house_id' => $i + 1,
                                'category_id' => $catCounter,
                                'brand_id' => $brandID,
                                'b_model_id' => $bmodelID,
                                'storage_id' => $q+1,
                                'discount' => 0,
                                'name' => $housesList[$i] . " " . $catList[$j],
                                'price' => mt_rand(10 * 10, 100 * 10) / 10,
                                'description' => $faker->sentence(12),
                                'viewAmount' => rand(0, 150),
                                'img' => $faker->imageUrl($width = 500, $height = 650),
                            ]
                        );
                    }
                }
                else {
                    $brandID = 0;
                    DB::table('products')->insert
                    (
                        [
                            'house_id' => $i + 1,
                            'category_id' => $catCounter,
                            'brand_id' => $brandID,
                            'b_model_id' => $bmodelID,
                            'storage_id' => $storageID,
                            'discount' => 0,
                            'name' => $housesList[$i] . " " . $catList[$j],
                            'price' => mt_rand(10 * 10, 100 * 10) / 10,
                            'description' => $faker->sentence(12),
                            'viewAmount' => rand(0, 150),
                            'img' => $faker->imageUrl($width = 500, $height = 650),
                        ]
                    );
                }
                $catCounter++;
            }
        }
    }
    }
}
