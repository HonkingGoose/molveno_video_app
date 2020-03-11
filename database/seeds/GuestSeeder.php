<?php

use Illuminate\Database\Seeder;
use App\Guest;
use Faker\Generator as Faker;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // (new Faker\Generator)->seed(100);
        // factory(App\Guest::class, 10)->create();

        for($i = 0; $i < 10; $i++){
            $guest = new Guest;
            $guest->firstName = $faker->firstName;
            $guest->lastName = $faker->lastName;
            $guest->salt = rand();
            $guest->roomNumber = $i +1;
            $guest->save();
        }
    }
}
