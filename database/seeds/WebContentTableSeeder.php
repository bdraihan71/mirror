<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('web_contents')->insert([
            'content' => '/frontend/img/carousel1.jpg',
        ]);

        DB::table('web_contents')->insert([
            'content' => '/frontend/img/carousel2.jpg',
        ]);

        DB::table('web_contents')->insert([
            'content' => '/frontend/img/carousel3.jpg',
        ]);

        DB::table('web_contents')->insert([
            'content' => '/frontend/img/carousel4.jpg',
        ]);

        DB::table('web_contents')->insert([
            'content' => '/frontend/img/carousel5.jpg',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Secured, Reliable and Customer Centric',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Techynaf is focused on building customer centric digital products. We spend most of our time talking to the actual users, figuring out the problems and trying different solutions and improving our products iteratively. ',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Services',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Industries',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Products',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Web Application Development <br> UI/UX Design <br> Mobile App Development <br> Domain & Hosting <br> Prototype <br> Testing <br> Content Development <br> Multimedia Content Digital Marketing',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'RMG <br> E Commerce <br> Non-Profits <br> Education <br> Startups <br> Restaurants & Cafes <br> Software Companies <br> Service Platforms',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Scheduling System <br> Money Requisition System <br> Application Processing System <br> Content Management System',
        ]);
        

        DB::table('web_contents')->insert([
            'content' => 'House 140, Road 10, South Bishil, Dhaka-1216, Bangladesh',
        ]);

        DB::table('web_contents')->insert([
            'content' => '<p>Call Us : 8801772628218 <br>8801674983245</p>',
        ]);

        DB::table('web_contents')->insert([
            'content' => '<p>Email: support@techynaf.com</p>',
        ]);
    }
}
