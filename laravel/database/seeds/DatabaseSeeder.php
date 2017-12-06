<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HousesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(BrandModelsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(StoragesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VouchersTableSeeder::class);
        $this->call(VouchersUsedTableSeeder::class);
    }
}
