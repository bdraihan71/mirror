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
        // Logistics Laser
        DB::table('sub_categories')->insert([
            'categories_id' => 1,
            'title' => 'KVANT ClubMax 6000',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 1,
            'title' => 'FB4 Media Server',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 1,
            'title' => 'Pangolin Beyond Laser Control Software',
        ]);

        // Logistics Lighting
        DB::table('sub_categories')->insert([
            'categories_id' => 2,
            'title' => 'Ma Lighting Control System ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 2,
            'title' => 'Grandma2 ',
        ]);

        // Logistics Video
        DB::table('sub_categories')->insert([
            'categories_id' => 3,
            'title' => 'Media Server : Resolume Arena 6 ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 3,
            'title' => 'Datapath X4 ',
        ]);

        // Logistics DJ Player
        DB::table('sub_categories')->insert([
            'categories_id' => 4,
            'title' => 'CDJ2000 Nexus 2 ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 4,
            'title' => 'DJM900 Nexus 2 ',
        ]);

        // Logistics Sound
        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Bose F1 Model 812 Flexible Array loudspeaker ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Bose F1 Subwoofer ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Bose L1 Model 2 Line Array tower ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Bose B2 Subwoofer ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Bose S1 Pro ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Bose T8S Mixer ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Bose T4S  Mixer ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Sennheiser G4 EW 100 835S Handheld  ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Sennheiser G4 EW 100 ME 2 Lavalier  ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 5,
            'title' => 'Shure Beta 58A Wired Handheld ',
        ]);

        // Services Laser
        DB::table('sub_categories')->insert([
            'categories_id' => 6,
            'title' => 'Custom Laser light shows ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 6,
            'title' => 'Laser Logo Advertising Services ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 6,
            'title' => 'Indoor/Outdoor Laser Beam Show ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 6,
            'title' => 'Laser Mapping Services ',
        ]);

        // Services Video
        DB::table('sub_categories')->insert([
            'categories_id' => 7,
            'title' => 'Video Mapping Services ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 7,
            'title' => 'Specialized in Resolume Arena 6 ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 7,
            'title' => 'Cutting Edge Mapping & Media Servers ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 7,
            'title' => 'Sound Reactivity & Interactive/Reactive Services ',
        ]);

        // Services Lighting
        DB::table('sub_categories')->insert([
            'categories_id' => 8,
            'title' => 'Lighting Design ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 8,
            'title' => '3D Pre Visualization',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 8,
            'title' => 'Console programming ',
        ]);

        // Services Live VJ
        DB::table('sub_categories')->insert([
            'categories_id' => 9,
            'title' => 'Real time Video Mixing ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 9,
            'title' => 'Video Mapping for Live Performance ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 9,
            'title' => 'Video Performance Artist ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 9,
            'title' => 'Customized Visuals ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 9,
            'title' => 'Custom Live Camera Feed ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 9,
            'title' => 'Visual Design ',
        ]);

        // Services Immersive Audio Visual Experience
        DB::table('sub_categories')->insert([
            'categories_id' => 10,
            'title' => 'We can combine multiple services we provide to showcase a full sensory audio visual experience ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 10,
            'title' => 'Corporate Launching ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 10,
            'title' => 'Product Launching ',
        ]);

        // Services Timecoded shows
        DB::table('sub_categories')->insert([
            'categories_id' => 11,
            'title' => 'Timecoded Laser Show ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 11,
            'title' => 'Timecoded Light Show ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 11,
            'title' => 'Timecoded Video/Visual Show ',
        ]);

        // Services Audio
        DB::table('sub_categories')->insert([
            'categories_id' => 12,
            'title' => 'Custom Sound Design ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 12,
            'title' => 'Full systems from Boardroom to Stadium size ',
        ]);

        DB::table('sub_categories')->insert([
            'categories_id' => 12,
            'title' => 'Sync with Midi, DMX, Serato, Ableton Link',
        ]);
    }
}
