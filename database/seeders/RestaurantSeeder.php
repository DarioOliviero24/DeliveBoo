<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $restaurant = [
                $name=> $faker->$name,
                $address=> $faker->$address,
                $BusinessNumber=> $faker->$BusinessNumber
            ];

            $newRestaurant = Restaurant::create($restaurant);
        }
    }
}
