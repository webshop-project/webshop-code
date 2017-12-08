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
        $faker = new \Faker\Factory();


        //cat x6 :Caps, Keycord, Mugs, PhoneCases, Shirts, USB
        //img MISSING!
        //size x4 : S, M, L, XL
        //brand x2 : Samsung, Iphone
        //b_model_id x5 : 7S, 8S, Note, 7S, X
        //house_id x4 : VV, DD, RR, SS
        //storage_id x5 : 4,8,16,32,64
        //name  : house+cat*6

        $modelsList = ['7S','8S','Note']; //! Normalisatie is niet goed gegaan de verbinding tussen model en type klopt niet!
        $sizeList = ['S','M','L','XL'];
        $catList = ['Caps','Keycords','Mugs','Phonecases','Shirts','USB'];
        $housesList = ['Variable Vikings','Database Dragons','Recursive Ravens','Script Serpents'];
        $gbList = ['4','8','16','32','64'];
        $brandsList = ['Samsung']; //! Normalisatie is niet goed gegaan de verbinding tussen model en type klopt niet!
        //$brandsList = \App\brand::all();

//        foreach($brandsList as $key => $value){
//
//        }
for ( $z = 0 ; $z < 100 ; $z++)
{

        for( $i = 0 ; $i < count($housesList); $i++ )
        {
            $houseID = 1;
            $sizeID = 0;
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
                                    'discount' => 0,
                                    'house_id' => $i+1,
                                    'category_id' => $catCounter,
                                    'size_id' => $sizeID,
                                    'brand_id' => $brandID,
                                    'b_model_id' => $l+1,
                                    'storage_id' => $storageID,
                                    'name' => $housesList[$i] . " " . $catList[$j] ." ". $brandsList[$k] ." " . $modelsList[$l],
                                    'price' => mt_rand (10*10, 100*10) / 10,
                                    'description' => $faker->create()->sentence(12),
                                    'supply' => random_int(0,25),
                                    'viewAmount' => rand(0,150),
                                ]
                            );
                        }

                    }
                }
                else if($j == 4)
                {
                    for ( $a = 0 ; $a < count($sizeList) ; $a++ )
                    {
                        $brandID = 0;

                        DB::table('products')->insert
                        (
                            [
                                'discount' => 0,
                                'house_id' => $i + 1,
                                'category_id' => $catCounter,
                                'size_id' => $a+1,
                                'brand_id' => $brandID,
                                'b_model_id' => $bmodelID,
                                'storage_id' => $storageID,
                                'name' => $housesList[$i] . " " . $catList[$j],
                                'price' => mt_rand(10 * 10, 100 * 10) / 10,
                                'description' => $faker->create()->sentence(12),
                                'supply' => random_int(0, 25),
                                'viewAmount' => rand(0, 150),
                            ]
                        );
                    }
                }
                else if($j == 5)
                {
                    for ( $q = 0 ; $q < count($gbList) ; $q++ )
                    {
                        $brandID = 0;
                        $bmodelID = 0;
                        DB::table('products')->insert
                        (
                            [
                                'discount' => 0,
                                'house_id' => $i + 1,
                                'category_id' => $catCounter,
                                'size_id' => 0,
                                'brand_id' => $brandID,
                                'b_model_id' => $bmodelID,
                                'storage_id' => $q+1,
                                'name' => $housesList[$i] . " " . $catList[$j],
                                'price' => mt_rand(10 * 10, 100 * 10) / 10,
                                'description' => $faker->create()->sentence(12),
                                'supply' => random_int(0, 25),
                                'viewAmount' => rand(0, 150),
                            ]
                        );
                    }
                }
                else {
                    $brandID = 0;
                    DB::table('products')->insert
                    (
                        [
                            'discount' => 0,
                            'house_id' => $i + 1,
                            'category_id' => $catCounter,
                            'size_id' => $sizeID,
                            'brand_id' => $brandID,
                            'b_model_id' => $bmodelID,
                            'storage_id' => $storageID,
                            'name' => $housesList[$i] . " " . $catList[$j],
                            'price' => mt_rand(10 * 10, 100 * 10) / 10,
                            'description' => $faker->create()->sentence(12),
                            'supply' => random_int(0, 25),
                            'viewAmount' => rand(0, 150),
                        ]
                    );
                }
                $catCounter++;
            }
        }
    }
    }

}
