<?php

use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Script Serpents', 'Database Dragons', 'Recursive Ravens', 'Variable Vikings'];

        foreach ($names as $name){
            DB::table('houses')->insert([
                'name' => $name
            ]);
        }

    }
}
