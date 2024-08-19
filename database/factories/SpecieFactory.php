<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specie>
 */
class SpecieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $species = ['Perro', 'Gato', 'Conejo', 'Tortuga', 'Pez', 'Ave'];

        $selectedSpecie = fake()->unique()->randomElement($species);

        return [
            'nombre' => $selectedSpecie
        ];
    }
}
