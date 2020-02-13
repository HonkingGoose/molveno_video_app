<?php

use Illuminate\Database\Seeder;
use App\Guest;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Faker\Generator)->seed(100);
        factory(App\Guest::class, 10)->create();
    }
}
