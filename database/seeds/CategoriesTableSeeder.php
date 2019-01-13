<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Logistics
        DB::table('categories')->insert([
            'name' => 'Laser',
            'type' => 'logistics',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Lighting',
            'type' => 'logistics',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Video',
            'type' => 'logistics',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'DJ Player',
            'type' => 'logistics',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Sound',
            'type' => 'logistics',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        // Services
        DB::table('categories')->insert([
            'name' => 'Laser',
            'type' => 'services',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Video',
            'type' => 'services',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Lighting',
            'type' => 'services',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Live VJ',
            'type' => 'services',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Immersive Audio Visual Experience',
            'type' => 'services',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Timecoded shows',
            'type' => 'services',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Audio',
            'type' => 'services',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);
    }
}
