<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Categories;

class CategoriesRestaurantSeeder extends Seeder
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
