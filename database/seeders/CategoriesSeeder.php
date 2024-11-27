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
            'italiano',
            'spagnolo',
            'giapponese',
            'cinese',
            'indiano',
        ];

        $restaurantIds = Restaurant::orderBy('id', 'asc')->pluck('id')->toArray();


        for ($i = 0; $i < count($categories); $i++) {
            Categories::create([
                'tipologia' => $categories[$i],
                'restaurant_id' => $restaurantIds[$i],
            ]);
        }  
    }
}
