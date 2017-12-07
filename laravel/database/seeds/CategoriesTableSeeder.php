<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = new \Faker\Factory();
        $carbon = new Carbon();
        $catList = ['Caps','Keycords','Mugs','Phonecases','Shirts','USB'];
        for( $i = 0 ; $i < count($catList) ; $i++ )
        {
            DB::table('categories')->insert
            (
                [
                    'name' => $catList[$i],
                    'created_at' => $carbon,
                ]
            );
        }
    }
}
