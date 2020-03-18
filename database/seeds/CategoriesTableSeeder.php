<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["name" => "hotelActivities" ],
            ["name" => "outdoorActivities"],
            ["name" => "generalInfoHotel" ],
        ];


        foreach ($categories as $category) {
            $cat = new Category();
            $cat->name = $category;
            $cat->save();
        }
    }
}
