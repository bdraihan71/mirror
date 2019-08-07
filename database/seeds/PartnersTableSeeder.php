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
        DB::table('partners')->insert([
            'name' => 'Amtranet Group',
            'type' => 'local',
            'img' => '/frontend/img/amtranet-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'North End Coffee Roasters',
            'type' => 'local',
            'img' => '/frontend/img/north-end-logo.jpeg',
        ]);

        DB::table('partners')->insert([
            'name' => 'Misfit Technologies',
            'type' => 'local',
            'img' => '/frontend/img/misfit-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'iEARN-BD',
            'type' => 'local',
            'img' => '/frontend/img/iearnbd-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'Pechas Game Studios',
            'type' => 'local',
            'img' => '/frontend/img/pgs-logo.jpg',
        ]);

        DB::table('partners')->insert([
            'name' => 'ELC',
            'type' => 'local',
            'img' => '/frontend/img/elc-logo.jpeg',
        ]);

        DB::table('partners')->insert([
            'name' => 'PPMC',
            'type' => 'local',
            'img' => '/frontend/img/ppmc-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'Hive',
            'type' => 'local',
            'img' => '/frontend/img/hive-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'DaamKoto',
            'type' => 'local',
            'img' => '/frontend/img/daamkoto-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'Nieoo',
            'type' => 'local',
            'img' => '/frontend/img/nieoo-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'Dhaka South City Corportation',
            'type' => 'local',
            'img' => '/frontend/img/dscc-logo.jpg',
        ]);
        

        DB::table('partners')->insert([
            'name' => 'US Department of State',
            'type' => 'international',
            'img' => '/frontend/img/usds-logo.png',
        ]);

        DB::table('partners')->insert([
            'name' => 'Youth Exchange & Study Program',
            'type' => 'international',
            'img' => '/frontend/img/yes-logo.png',
        ]);
    }
}
