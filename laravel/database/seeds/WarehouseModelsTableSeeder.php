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

        $faker = Faker\Factory::create('nl_NL');
        $housesList = ['Variable Vikings', 'Database Dragons', 'Recursive Ravens', 'Script Serpents'];
        $catList = ['Cap', 'Keycord', 'Mug', 'Phonecase', 'Shirt', 'USB'];
        $usbsizeList = ['8','16','32','64'];
        $shirtSizeList = ['S','M','L','XL'];
        $product_id = 1;
        for ($i = 0; $i < count($housesList) * count($catList); $i++)
        {

            if($i+1 == 9 || $i+1 == 10 || $i+1 == 20 || $i+1 == 21 || $i+1 == 31 || $i+1 == 32 || $i+1 == 42 || $i+1 == 43)
            {
                for ($j = 0; $j < count($shirtSizeList); $j++)
                {
                    //shirts
                    $product_id++;
                    DB::table('warehouse')->insert
                    (
                        [
                            'product_id'    => $product_id,
                            'size_id'       => $j + 1,
                            'price'         => random_int(15,25),
                            'supply'        => random_int(0,10),
                        ]
                    );
                }
            }
            elseif ($i+1 == 11 || $i+1 == 22 || $i+1 == 33 || $i+1 == 44)
            {
                for ($j = 0; $j < count($usbsizeList); $j++)
                {
                    //usb
                    $product_id++;
                    DB::table('warehouse')->insert
                    (
                        [
                            'product_id'    => $product_id,
                            'size_id'       => count($shirtSizeList) + 1 + $j,
                            'price'         => random_int(15,25),
                            'supply'        => random_int(0,10),
                        ]
                    );
                }
            }
            else
            {
                DB::table('warehouse')->insert
                (
                    [
                        'product_id'    => $product_id,
                        'price'         => random_int(15,25),
                        'supply'        => random_int(0,10),
                    ]
                );
            }
        }
    }
}
