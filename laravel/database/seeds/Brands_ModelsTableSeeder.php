<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Brands_ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
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
                    'modelName' => $modelsList[$i],
                    'created_at' => $carbon,
                ]
            );
        }
    }
}
