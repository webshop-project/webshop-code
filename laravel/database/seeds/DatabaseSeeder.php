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
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(HousesTableSeeder::class);
         $this->call(StoragesTableSeeder::class);
         $this->call(SizesTableSeeder::class);
         $this->call(BrandsTableSeeder::class);
         $this->call(Brands_ModelsTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
    }
}
