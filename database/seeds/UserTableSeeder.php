<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@techynaf.com',
            'password' => bcrypt('bangladesh'),
            'role' => 'super-admin',
            'verified' => 1,
        ]);

        DB::table('users')->insert([
            'email' => 'mobashirmonim@gmail.com',
            'password' => bcrypt('bangladesh'),
            'role' => 'super-admin',
            'verified' => 1,
        ]);

        DB::table('users')->insert([
            'email' => 'superadmin@ecube-entertainment.com',
            'password' => bcrypt('Pgr3]pV"m~djLB].YW8q'),
            'role' => 'admin',
            'verified' => 1,
        ]);
    }
}
