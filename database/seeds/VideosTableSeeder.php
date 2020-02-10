<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //for now, we can use this to insert a couple of entries in the database

        DB::table('videos')->insert([
            'youtube_uid' => 'Q2HgEiHPIPI',
            'title' => 'my first video',
            'description' => 'this is my first video',
            'category' => 'nature',
            'reviews' => 4,
            'available_to_watch' => 1,
            'suitable_for_kids' => 1,
            'created_by' => 'kees'
        ]);
        
        DB::table('videos')->insert([
            'youtube_uid' => 'GO-MIrlkGvE',
            'title' => 'my second video',
            'description' => 'this is my second video',
            'category' => 'nature',
            'reviews' => 4,
            'available_to_watch' => 1,
            'suitable_for_kids' => 1,
            'created_by' => 'kees'
        ]);

        DB::table('videos')->insert([
            'youtube_uid' => 'a5Ck2qNAGmw',
            'title' => 'dinky',
            'description' => 'this is my third video',
            'category' => 'nature',
            'reviews' => 4,
            'available_to_watch' => 1,
            'suitable_for_kids' => 1,
            'created_by' => 'kees'
        ]);


        
    }
}
