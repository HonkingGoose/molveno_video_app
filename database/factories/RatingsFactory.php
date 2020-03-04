<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'score' => $faker->numberBetween($min = 1, $max = 5),
        'video_id' => 1,
        'user_hash' => rand()
    ];
});
