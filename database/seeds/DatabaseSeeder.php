<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(GuestSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(RatingsTableSeeder::class);


        if (App::environment('local')) {
            $this->call(DevUserSeeder::class);
        }
    }
}
