<?php

use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new \Carbon\Carbon();
        for ($i = 0; $i <= 15; $i++){
            DB::table('discounts')->insert
            (
                [
                    'product_id'    => random_int(1, 80),
                    'discount'      => random_int(10, 50),
                    'start_date'    => $carbon->setDateTime(2018, 1, 1, 00, 00, 01),
                    'end_date'      => $carbon->setDateTime(2018, 1, 31, 23, 59, 59),
                ]
            );
        }
    }
}
