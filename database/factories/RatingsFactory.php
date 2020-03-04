<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    // dit gaan we misschien ooit nog gebruiken, voor nu gaan we de seeder hardcoden
    // $videoId = \App\Video::all()->random()->id;
    // $userHash = \App\Guest::all()->random()->generateUserHash();

    // DB::table('ratings')->select('1')->where("video_id", $videoId)->andWhere("user_hash", $userHash);

    return [
        'score' => $faker->numberBetween($min = 1, $max = 5),
        'video_id' => 1,
        'user_hash' => 
    ];
});
