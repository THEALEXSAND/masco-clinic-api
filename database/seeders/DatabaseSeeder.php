<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CustomerSeeder::class,
            AnimalTypeSeeder::class,
            RecipeSeeder::class,
            UserTypeSeeder::class,
            UserSeeder::class,
            // VaccineRecordSeeder::class,
            // AppointmentSeeder::class,
        ]);
    }
}
