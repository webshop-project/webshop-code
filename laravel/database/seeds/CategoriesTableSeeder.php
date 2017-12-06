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
        $categories = ['t-shirts','caps','buttons','koffiemokken','telefoonhoesjes','wintermutsen','usb-sticks','keycords'];

        foreach ($categories as $category)
        {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
