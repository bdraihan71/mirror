<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Le Name',
            'type' => 'local',
            'feedback' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
            'company' => 'Lorem ipsum',
            'img' => '/frontend/img/techynaf-logo.png',
        ]);

        DB::table('clients')->insert([
            'name' => 'Cum sociis',
            'type' => 'local',
            'feedback' => ' et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu,',
            'company' => 'natoque penatibus',
            'img' => '/frontend/img/techynaf-logo.png',
        ]);

        DB::table('clients')->insert([
            'name' => 'pretium quis,',
            'type' => 'local',
            'feedback' => 'consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,',
            'company' => 'sem. Nulla ',
            'img' => '/frontend/img/techynaf-logo.png',
        ]);
    }
}
