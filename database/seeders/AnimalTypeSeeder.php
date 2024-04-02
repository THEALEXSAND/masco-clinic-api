<?php

namespace Database\Seeders;

use App\Models\AnimalBreed;
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
            ->hasBreeds(8)
            ->create(
                ['tipo' => 'Perro']
            );

        AnimalType::factory()
            ->has(AnimalBreed::factory()->count(8)->createCatBreeds(), 'breeds')
            ->create(['tipo' => 'Gato']);
    }
}
