<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'nome_guest' => $faker->name,
                'mail_guest' => $faker->email,
                'telefono_guest' => $this->createRandomItalianPhoneNumber(),
                'prezzo_totale' => $faker->randomFloat(2, 10, 100),
            ]);
        }
    }
    public function createRandomItalianPhoneNumber()
    {
        $faker = Faker::create();
        
        return '+39' . $faker->randomNumber(3, true) . $faker->randomNumber(3, true) . $faker->randomNumber(4, true);
    }
}
