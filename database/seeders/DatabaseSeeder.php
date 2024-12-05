<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\UtentSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\PlatesSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\CategoriesRestaurantSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UsersSeeder::class,
            RestaurantSeeder::class,
            CategoriesSeeder::class,
            PlatesSeeder::class,
            OrderSeeder::class,
            OrderPlatesSeeder::class,
            CategoriesRestaurantSeeder::class,
        ]);
    }
}
