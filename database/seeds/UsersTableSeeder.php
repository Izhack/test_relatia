<?php

use Faker\Factory as Faker;
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
        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 3; $i++) {
            //Users complet
            DB::table('users')->insert([
                'lastname' => $faker->lastName(),
                'firstname' => $faker->firstName(),
                'email' => $faker->safeEmail(),
                'event' => 1,
            ]);

            //Users sans lastname
            DB::table('users')->insert([
                'firstname' => $faker->firstName(),
                'email' => $faker->safeEmail(),
                'event' => 1,
            ]);

            //Users sans lastname ni firstaname
            DB::table('users')->insert([
                'email' => $faker->safeEmail(),
                'event' => 1,
            ]);
        }

    }
}
