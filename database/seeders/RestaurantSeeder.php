<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
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
                'name' => $faker->company,
                'address' => $faker->address,
                'P_Iva' => $faker->numerify('################'),
            ];

            Restaurant::create($restaurant);
        }
    }
}
