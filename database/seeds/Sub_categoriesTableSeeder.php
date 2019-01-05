<?php

use Illuminate\Database\Seeder;

class Sub_categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'categories_id' => 'categories',
            'title' => 'categories',
        ]);
    }
}
