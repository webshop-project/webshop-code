<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('nl_NL');
        for($i = 0 ; $i < 100 ; $i++)
        {
            DB::table('Users')->insert(
                [
                    'amountOfLogin' => random_int(0,200),
                    'loginToken'    => $faker->text(12),
                    'loginName'     => $faker->firstName,
                    'email'         => 'tomaszt@hotmail.nl',
                    'studentNummer' => $faker->ean8,
                    'password'      => bcrypt('geheim'),
                    'role'          => 'student',
                    'country'       => 'Nederland',
                    'postcode'      => $faker->postcode,
                    'streetName'    => $faker->streetName,
                    'houseNumber'   => random_int(1,999),
                    'houseNumberAddOn'=>$faker->randomLetter,
                    'firstName'     => $faker->firstName,
                    'lastName'      => $faker->lastName,
                    'middleName'    => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter,
                    'remember_token'=> $faker->text(12),
                ]
            );
        }
    }
}
