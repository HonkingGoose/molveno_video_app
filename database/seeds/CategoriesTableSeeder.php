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
            ["name" => "hotel activities" ],
            ["name" => "outdoor activities"],
            ["name" => "general info" ],
        ];


        foreach ($categories as $category) {
            $cat = new Category();
            $cat->name = $category["name"];
            $cat->save();
        }
    }
}
