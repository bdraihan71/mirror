<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);
        
        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);

        DB::table('products')->insert([
            'price' => '100',
            'name' => 'Le Name',
            'quantity' => 100,
            'img' => '/frontend/img/carousel2.jpeg',
        ]);
    }
}
