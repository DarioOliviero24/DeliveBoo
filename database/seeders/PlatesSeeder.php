<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plates;
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
            'Tomatoes'
            
        ];

        for ($i = 0; $i < 10; $i++) {
            $plates = [
                'name' => $faker->word,
                'ingredient' => $ingredients[array_rand($ingredients)],
                'price' => $faker->randomFloat(2, 5, 50),
                'restaurants_id' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            Plates::create($plates);
        }
    }
}
