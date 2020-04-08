<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    $uids = [
        'KmQnNWNlIac',
        'TGtnOx5pNew',
        'yVmAQ6rXRmk',
        '4RepHt7jgGo'
    ];

    $categories = App\Category::all();


    return [
        'youtube_uid' => $uids[$faker->numberBetween($min = 0, $max = 2)],
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'category_id' => $categories->random()->id,
        'available_to_watch' => $faker->numberBetween($min = 0, $max = 1),
        'suitable_for_kids' => $faker->numberBetween($min = 0, $max = 1),
        'created_by' => $faker->name
    ];
});
