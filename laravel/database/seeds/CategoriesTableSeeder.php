<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catList = ['Cap','Keycord','Mug','Phonecase','Shirt','USB'];
        for( $i = 0 ; $i < count($catList) ; $i++ )
        {
            DB::table('categories')->insert
            (
                [
                    'name' => $catList[$i],
                ]
            );
        }
    }
}
