<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
        $brandsList = ['Samsung','Iphone'];
        for( $i = 0 ; $i < count($brandsList) ; $i++ )
        {
            DB::table('brands')->insert
            (
                [
                    'brandName' => $brandsList[$i],
                    'created_at' => $carbon,
                ]
            );
        }
    }
}
