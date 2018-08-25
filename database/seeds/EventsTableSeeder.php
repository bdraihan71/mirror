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
            'name' => 'Le Name',
            'tagline' => 'Le Tagline',
            'location' => 'Somewhere',
            'date_start' => '1975-09-08',
            'date_end' => '1975-09-08',
            'start' => '14:00:00',
            'end' => '23:59:00',
            'img_1' => '/frontend/img/carousel1.jpeg',
            'img_2' => '/frontend/img/carousel1.jpeg',
            'img_3' => '/frontend/img/carousel1.jpeg',
            'img_4' => '/frontend/img/carousel1.jpeg',
            'img_5' => '/frontend/img/carousel1.jpeg',
            'description' => 'Le Description',
            'ticket_number' => '1',
            'deleted' => null,
        ]);

        DB::table('events')->insert([
            'name' => 'Le Name',
            'tagline' => 'Le Tagline',
            'location' => 'Somewhere',
            'date_start' => '1975-09-12',
            'date_end' => '1975-09-12',
            'start' => '14:00:00',
            'end' => '23:59:00',
            'img_1' => '/frontend/img/carousel1.jpeg',
            'img_2' => '/frontend/img/carousel1.jpeg',
            'img_3' => '/frontend/img/carousel1.jpeg',
            'img_4' => '/frontend/img/carousel1.jpeg',
            'img_5' => '/frontend/img/carousel1.jpeg',
            'description' => 'Le Description',
            'ticket_number' => '1',
            'deleted' => null,
        ]);

        DB::table('events')->insert([
            'name' => 'Le Name',
            'tagline' => 'Le Tagline',
            'location' => 'Somewhere',
            'date_start' => '1975-09-09',
            'date_end' => '1975-09-09',
            'start' => '14:00:00',
            'end' => '23:59:00',
            'img_1' => '/frontend/img/carousel1.jpeg',
            'img_2' => '/frontend/img/carousel1.jpeg',
            'img_3' => '/frontend/img/carousel1.jpeg',
            'img_4' => '/frontend/img/carousel1.jpeg',
            'img_5' => '/frontend/img/carousel1.jpeg',
            'description' => 'Le Description',
            'ticket_number' => '1',
            'deleted' => null,
        ]);

        DB::table('events')->insert([
            'name' => 'Le Name',
            'tagline' => 'Le Tagline',
            'location' => 'Somewhere',
            'date_start' => '1975-09-10',
            'date_end' => '1975-09-10',
            'start' => '14:00:00',
            'end' => '23:59:00',
            'img_1' => '/frontend/img/carousel1.jpeg',
            'img_2' => '/frontend/img/carousel1.jpeg',
            'img_3' => '/frontend/img/carousel1.jpeg',
            'img_4' => '/frontend/img/carousel1.jpeg',
            'img_5' => '/frontend/img/carousel1.jpeg',
            'description' => 'Le Description',
            'ticket_number' => '1',
            'deleted' => null,
        ]);

        DB::table('events')->insert([
            'name' => 'Le Name',
            'tagline' => 'Le Tagline',
            'location' => 'Somewhere',
            'date_start' => '1975-09-11',
            'date_end' => '1975-09-11',
            'start' => '14:00:00',
            'end' => '23:59:00',
            'img_1' => '/frontend/img/carousel1.jpeg',
            'img_2' => '/frontend/img/carousel1.jpeg',
            'img_3' => '/frontend/img/carousel1.jpeg',
            'img_4' => '/frontend/img/carousel1.jpeg',
            'img_5' => '/frontend/img/carousel1.jpeg',
            'description' => 'Le Description',
            'ticket_number' => '1',
            'deleted' => null,
        ]);
    }
}
