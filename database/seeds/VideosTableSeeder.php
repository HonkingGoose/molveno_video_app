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


        //Video Category seeder

        $categories = [
            ["name" => "hotelActivities" ],
            ["name" => "outdoorActivities"],
            ["name" => "generalInfoHotel" ],
        ];

        foreach ($categories as $categoryData) {
            $category = new Video();
            $category->name = $categoryData['name'];
            $category->categories()->associate($categoryData['name']);
            $category->save();
        }
    }


}
