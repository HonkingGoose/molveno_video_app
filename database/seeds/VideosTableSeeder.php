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

        //\App\Video::truncate();

        (new Faker\Generator)->seed(123);

        factory(App\Video::class, 19)->create();
    }
}
