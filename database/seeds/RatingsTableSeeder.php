<?php

use App\Guest;
use App\Rating;
use App\Video;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // We're not using this factory at the moment.
        // (new Faker\Generator)->seed(123);
        // factory(App\Rating::class, 3)->create();

        // Get list of guests
        $guests = Guest::all();
        // Get lists of videos
        $videos = Video::all();
        // Attach a rating to each video for each guest.
        foreach ($videos as $video) {
            foreach ($guests as $guest) {
                $rating = new Rating;
                $rating->video_id = $video->id;
                $rating->user_hash = $guest->generateUserHash();
                $rating->score = rand($min =1, $max = 5);
                $rating->save();
            }
        }
    }
}
