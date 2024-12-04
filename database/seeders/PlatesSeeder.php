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
            'Zucchero',
            'Farina',
            'Sale',
            'Burro',
            'Latte',
            'Uova',
            'Formaggio',
            'Pomodori',
            'Basilico',
            'Aglio',
            'Cipolla',
            'Pepe',
            'Cioccolato',
            'Vaniglia',
            'Panna'
        ];

        $restaurantIds = Restaurant::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {

            $ingredientsArrayRecipe = [];

            foreach($ingredients as $ingredient) {

                $random = $faker->boolean;

                if($random) {
                    $ingredientsArrayRecipe[] = $ingredient;
                }

                if (count($ingredientsArrayRecipe) > 4) {
                    break;
                }
            }

            Plates::create([

                'plate_name' => $faker->word,
                'ingredients' => implode(', ', $ingredientsArrayRecipe),
                'price' => $faker->randomFloat(2, 5, 50),
                'restaurants_id' => $faker->randomElement($restaurantIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


