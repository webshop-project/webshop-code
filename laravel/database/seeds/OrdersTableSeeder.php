<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 25; $i++)
        {
            $faker = Faker\Factory::create('nl_NL');

            DB::table('orders')->insert([
                'warehouse_id'  => random_int(1,48),
                'user_id'       => random_int(1,100),
                'amount'        => random_int(1,5),
                'bought_at'     => carbon::now(),
                'price'         => random_int(1,35),
                'discount'      => random_int(1,10),
                'shipped'       => 1,
            ]);
        }
    }
}
