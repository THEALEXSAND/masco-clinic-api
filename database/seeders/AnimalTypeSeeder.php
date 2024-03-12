<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Seeder;

class AnimalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnimalType::factory()
            ->count(20)
            ->create();
    }
}
