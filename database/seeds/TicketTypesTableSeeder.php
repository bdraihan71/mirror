<?php

use Illuminate\Database\Seeder;

class TicketTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_types')->insert([
            'event_id' => '1',
            'name' => 'Normal',
            'price' => 1000,
        ]);

        DB::table('ticket_types')->insert([
            'event_id' => '2',
            'name' => 'Normal',
            'price' => 2000,
        ]);

        DB::table('ticket_types')->insert([
            'event_id' => '3',
            'name' => 'Normal',
            'price' => 3000,
        ]);

        DB::table('ticket_types')->insert([
            'event_id' => '4',
            'name' => 'Normal',
            'price' => 4000,
        ]);

        DB::table('ticket_types')->insert([
            'event_id' => '5',
            'name' => 'Normal',
            'price' => 5000,
        ]);
    }
}
