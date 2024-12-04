<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant;
use App\Models\Categories;

class CategoryRestaurantSeeder extends Seeder
{
    public function run()
    {
        $restaurants = Restaurant::all();
        $categories = Categories::all();
        foreach ($restaurants as $restaurant) {
            $restaurant->categories()->attach($categories->random(rand(2, 5)));
        }
    }
}
