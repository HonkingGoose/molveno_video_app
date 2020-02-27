<?php

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
        (new Faker\Generator)->seed(123);
        factory(App\Rating::class, 3)->create();
    }
}
