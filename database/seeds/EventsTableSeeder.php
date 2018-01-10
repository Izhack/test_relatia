<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'status' => 'Rec',
        ]);

        DB::table('events')->insert([
            'status' => 'Insert',
        ]);
    }
}
