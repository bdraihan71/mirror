<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'f_name' => 'Mobashir',
            'l_name' => 'Monim',
            'address' => 'Uttara',
            'phone' => '+8801822110448',
            'user_id' => 1,
            'fb_url' => 'something',
            'dob' => '1996-09-08',
            'gender' => 'male',
        ]);

        DB::table('profiles')->insert([
            'f_name' => 'Mobashir',
            'l_name' => 'Monim',
            'address' => 'Uttara',
            'phone' => '+8801822110448',
            'user_id' => 2,
            'fb_url' => 'something',
            'dob' => '1996-09-08',
            'gender' => 'male',
        ]);

        DB::table('profiles')->insert([
            'f_name' => 'Super',
            'l_name' => 'Admin',
            'address' => 'Ecube',
            'phone' => '1234567890',
            'user_id' => 3,
            'fb_url' => 'something',
            'dob' => '1996-09-08',
            'gender' => 'male',
        ]);
    }
}
