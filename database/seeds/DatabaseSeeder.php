<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            WebContentTableSeeder::class,
            ProfilesTableSeeder::class,
            ProductsTableSeeder::class,
            PartnersTableSeeder::class,
            CategoriesTableSeeder::class,
            Sub_categoriesTableSeeder::class,
        ]);
    }
}
