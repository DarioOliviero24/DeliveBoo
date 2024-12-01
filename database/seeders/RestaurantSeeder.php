<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\User;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $restaurant = [
                'name' => $faker->company,
                'address' => $faker->address,
                'P_Iva' => $this->generatePiva(),
                'user_id' => User::all()->random()->id,
            ];

            Restaurant::create($restaurant);
        }
    }
    public function generatePiva()
    {
        $faker = Faker::create();

        return $faker->numerify('################');
    }
}
