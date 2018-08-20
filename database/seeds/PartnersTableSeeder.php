<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'local',
            'img' => '/frontend/img/carousel1.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'local',
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'local',
            'img' => '/frontend/img/carousel3.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'local',
            'img' => '/frontend/img/carousel1.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'local',
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'local',
            'img' => '/frontend/img/carousel3.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'international',
            'img' => '/frontend/img/carousel1.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'international',
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'international',
            'img' => '/frontend/img/carousel3.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'international',
            'img' => '/frontend/img/carousel1.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'international',
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Le Name',
            'type' => 'international',
            'img' => '/frontend/img/carousel3.jpeg',
        ]);
    }
}
