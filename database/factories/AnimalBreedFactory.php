<?php

namespace Database\Factories;

use App\Models\AnimalBreed;
use App\Models\AnimalType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalBreed>
 */
class AnimalBreedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $breed = $this->faker->randomElement(
            ['Labrador', 'Golden Retriever', 'Jack Russell Terrier', 'Chihuahua', 'Husky', 'Dalmata', 'Galgo', 'Carlino', 'Caniche', 'Rottweiller']
        );

        return [
            'animal_type_id' => AnimalBreed::factory(),
            'raza' => $breed
        ];
    }

    public function createCatBreeds()
    {
        return $this->state(function (array $attributes) {
            $breed = $this->faker->randomElement(
                ['Abisinio', 'Americano de pelo duro', 'Asiático', 'Balinés', 'Bengalí', 'Birmano', 'Bobtail japonés de pelo corto', 'Bobtail japonés de pelo largo']
            );

            return ['raza' => $breed];
        });
    }
}
