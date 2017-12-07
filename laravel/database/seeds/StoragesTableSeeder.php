<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class StoragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gbList = ['4','8','16','32','64'];
        for( $i = 0 ; $i < count($gbList) ; $i++ )
        {
            DB::table('storages')->insert
            (
                [
                    'gb' => $gbList[$i],
                ]
            );
        }
    }
}
