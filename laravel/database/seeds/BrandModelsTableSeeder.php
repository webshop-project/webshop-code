<?php

use Illuminate\Database\Seeder;

class BrandModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelsList = ['normal','polo','7S','8S','Note','7S','X'];
        for( $i = 0 ; $i < count($modelsList) ; $i++ )
        {
            if($i >= 5)
            {
                DB::table('brand_models')->insert
                (
                    [
                        'brand_id' => 2,
                        'name' => $modelsList[$i],
                    ]
                );
            }
            elseif($i >= 2)
            {
                DB::table('brand_models')->insert
                (
                    [
                        'brand_id' => 1,
                        'name' => $modelsList[$i],
                    ]
                );
            }
            else
            {
                DB::table('brand_models')->insert
                (
                    [
                        'name' => $modelsList[$i],
                    ]
                );
            }
        }
    }
}
