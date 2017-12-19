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
        $modelsList = ['7S','8S','Note','7S','X'];
        $j = 1;
        for( $i = 0 ; $i < count($modelsList) ; $i++ )
        {
            if($i > 2)
            {
                $j=2;
            }
            DB::table('brand_models')->insert
            (
                [
                    'brand_id' => $j,
                    'name' => $modelsList[$i],
                ]
            );
        }
    }
}
