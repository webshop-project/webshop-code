<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizeList = ['S','M','L','XL','8','16','32','64'];
        for( $i = 0 ; $i < count($sizeList) ; $i++ )
        {
            DB::table('sizes')->insert
            (
                [
                    'size' => $sizeList[$i],
                ]
            );
        }
    }
}
