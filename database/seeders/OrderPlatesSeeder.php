<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Order_plates;
use App\Models\Plates;
use App\Models\Order;

class OrderPlatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (Plates::all() as $plate) {
            $random = $faker->boolean;
            if ($random) {
                Order_plates::create([
                    'quantita' => $faker->randomNumber(1, 5),
                    'orders_id' => Order::all()->random()->id,
                    'plates_id' => $plate->id,
                ]);
            }
        }
    }
}
