<?php

use Illuminate\Database\Seeder;
use App\Video;
use App\Category;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       //Thumbnail watch_video factory

        (new Faker\Generator)->seed(123);

        factory(App\Video::class, 19)->create();


       
    }


}
