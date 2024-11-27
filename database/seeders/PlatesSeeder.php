<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plates;
use App\Models\Restaurant;
use Faker\Generator as Faker;

class PlatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $ingredients = [
            'Sugar', 
            'Flour', 
            'Salt',
            'Butter',
            'Milk', 
            'Eggs',
            'Cheese',
            'Tomatoes', 
            'Basil',
            'Garlic', 
            'Onion', 
            'Pepper',
            'Chocolate',
            'Vanilla', 
            'Cream'
        ];

        $restaurantIds = Restaurant::pluck('id')->toArray();

        if (empty($restaurantIds)) {
            throw new \Exception('La tabella restaurants non contiene ristoranti. Inserisci dei ristoranti prima di eseguire questo seeder.');
        }

        for ($i = 0; $i < 10; $i++) {
            Plates::create([
                'name' => $faker->word,
                'ingredient' => $ingredients[array_rand($ingredients)],
                'price' => $faker->randomFloat(2, 5, 50),
                'restaurants_id' => $faker->randomElement($restaurantIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
