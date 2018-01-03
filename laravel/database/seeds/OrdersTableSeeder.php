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
            for ($j = 0; $j < 2; $j++)
            {
                DB::table('orders')->insert([
                    'orderNumber'   => $i+1,
                    'warehouse_id'  => random_int(1,68),
                    'user_id'       => random_int(1,100),
                    'amount'        => random_int(1,5),
                    'bought_at'     => carbon::now(),
                    'price'         => mt_rand (15*10, 50*10) / 10,
                    'discount'      => mt_rand (1*10, 10*10) / 10,
                    'shipped'       => 1,
                ]);
            }
        }
    }
}
