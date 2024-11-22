<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plates;
use Faker\Generator as Faker;

class PiattiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $plates = [
                'name' => $faker->name,
                'ingredient' => $faker->ingredient,
                'price' => $faker->price,
            ];

            Plates::create($plates);
        }
    }
}
