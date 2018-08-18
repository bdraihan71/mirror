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
            'content' => '/frontend/img/carousel1.jpeg',
        ]);

        DB::table('web_contents')->insert([
            'content' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('web_contents')->insert([
            'content' => '/frontend/img/carousel3.jpeg',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'EVENTS. ENTERTAINMENT. EXPERIENCE.',
        ]);

        DB::table('web_contents')->insert([
            'content' => '<p>Lorem ipsum elit. Odit, voluptas, optio, libero, quam fugit vero voluptates dolores atque praesentium! Dolorum, nulla, placeat commodi deserunt amet corrupti dignissimos vel similique laudantium debitis ab at quas alias sunt harum minima nobis est deleniti aperiam earum?<div class="d-none d-sm-block"> Distinctio, vel, odio, repudiandae excepturi nostrum numquam voluptatem consequatur
            <br><br>quasi quibusdam et porro assumenda nesciunt ipsam facere mollitia quam esse beatae optio dolorem fugiat culpa? Itaque, nam, error, officia ab dolor nulla voluptatum veniam omnis suscipit aut exercitationem natus tenetur pariatur. Earum, magni, aliquam autem natus fugiat odio error laudantium nam temporibus placeat! Omnis.</div></p>',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'EVENTS',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'DESIGN & PRODUCTION',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'INTERNATIONAL ARTISTS',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'PR & DATABASE',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'BRAND BUILDING',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa? quod delectus beatae quia nam culpa?',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa? quod delectus beatae quia nam culpa?',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa? quod delectus beatae quia nam culpa?',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa? quod delectus beatae quia nam culpa?',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa? quod delectus beatae quia nam culpa?',
        ]);

        DB::table('web_contents')->insert([
            'content' => 'Banani, Dhaka, Bangladesh',
        ]);

        DB::table('web_contents')->insert([
            'content' => '<p>Call Us : 017*******, <br>019********<br> 
            Email: ecube@gmail.com</p>',
        ]);
    }
}
