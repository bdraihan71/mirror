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
        DB::table('categories')->insert([
            'name' => 'Laser',
            'type' => 'Service',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Lighting',
            'type' => 'Service',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Video',
            'type' => 'Service',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'DJ Player',
            'type' => 'Service',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Sound',
            'type' => 'Service',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Laser',
            'type' => 'Production',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Video',
            'type' => 'Production',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Lighting',
            'type' => 'Production',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Live VJ ',
            'type' => 'Production',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Immersive Audio Visual Experience',
            'type' => 'Production',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Timecoded shows',
            'type' => 'Production',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

        DB::table('categories')->insert([
            'name' => 'Audio',
            'type' => 'Production',
            'image' => '/frontend/img/cover.jpg',
            'call_to_action' => 'BOOK NOW',
        ]);

    }
}
