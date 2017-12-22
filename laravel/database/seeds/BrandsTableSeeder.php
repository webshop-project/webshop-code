<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsList = ['shirt','Samsung','Iphone'];
        for( $i = 0 ; $i < count($brandsList) ; $i++ )
        {
            DB::table('brands')->insert
            (
                [
                    'name' => $brandsList[$i],
                ]
            );
        }
    }
}
