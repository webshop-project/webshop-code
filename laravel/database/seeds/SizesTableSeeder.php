<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
        $sizeList = ['S','M','L','XL'];
        for( $i = 0 ; $i < count($sizeList) ; $i++ )
        {
            DB::table('sizes')->insert
            (
                [
                    'size' => $sizeList[$i],
                    'created_at' => $carbon,
                ]
            );
        }
    }
}
