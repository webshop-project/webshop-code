<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $housesList = ['Variable Vikings','Database Dragons','Recursive Ravens','Script Serpents'];
        for( $i = 0 ; $i < count($housesList) ; $i++ )
        {
            DB::table('houses')->insert
            (
                [
                    'name' => $housesList[$i],
                ]
            );
        }
    }
}
