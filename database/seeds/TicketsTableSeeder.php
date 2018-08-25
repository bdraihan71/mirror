<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 1; $j <= 5; $j++) {
            for ($i = 0; $i < 100; $i++) {
                DB::table('tickets')->insert([
                    'event_id' => $j,
                    'ticket_type_id' => $j,
                ]);
            }
        }
    }
}
