<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fr_FR');

            DB::table('users')->insert([
                'lastname' => $faker->lastName(),
                'firstname' => $faker->firstName(),
                'email' => $faker->safeEmail(),
            ]);

            DB::table('users')->insert([
                'firstname' => $faker->firstName(),
                'email' => $faker->safeEmail(),
            ]);

            DB::table('users')->insert([
                'email' => $faker->safeEmail(),
            ]);
    }
}
