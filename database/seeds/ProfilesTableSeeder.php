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
        ]);
    }
}
