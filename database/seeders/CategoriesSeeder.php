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
        $categories = [
            'Italiano',
            'Spagnolo',
            'Giapponese',
            'Cinese',
            'Indiano',
        ];

        $restaurantIds = Restaurant::orderBy('id', 'asc')->pluck('id')->toArray();


        for ($i = 0; $i < 10; $i++) {
            Categories::create([
                'tipologia' => $categories[rand(0, 4)],
                'restaurant_id' => $restaurantIds[$i]
            ]);
        }
    }
}
