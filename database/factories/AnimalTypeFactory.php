<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalType>
 */
class AnimalTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $animalType = $this->faker->randomElement(['Perro', 'Gato']);

        $breed = $animalType === 'Perro' ? $this->faker->randomElement(['Labrador', 'Golden Retriever', 'Jack Russell Terrier', 'Chihuahua', 'Husky', 'Dalmata']) : $this->faker->randomElement(['Abisinio', 'Americano de pelo duro', 'Asiático', 'Balinés', 'Bengalí', 'Birmano', 'Bobtail japonés de pelo corto', 'Bobtail japonés de pelo largo']);

        return [
            'tipo' => $animalType,
            'raza' => $breed
        ];
    }
}
