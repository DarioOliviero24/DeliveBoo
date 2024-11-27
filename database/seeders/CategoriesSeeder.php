<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Categories;
use App\Models\Restaurant;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantIds = Restaurant::pluck('id')->toArray();
        $categories = [
            'italiano',
            'spagnolo',
            'giapponese',
            'cinese',
            'indiano',
            'messicano',
        ];

        foreach ($restaurantIds as $restaurantId) {
            foreach ($categories as $category) {
                Categories::create([
                    'name' => $category,
                    'restaurant_id' => $restaurantId,
                ]);
            }
        }
    }
}
