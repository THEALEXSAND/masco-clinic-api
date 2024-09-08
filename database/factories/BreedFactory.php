<?php

namespace Database\Factories;

use App\Models\Specie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    private $breeds = [
        'dogs' => ['Labrador', 'Golden Retriever', 'Jack Russell Terrier', 'Chihuahua', 'Husky', 'Dalmata', 'Galgo', 'Carlino', 'Caniche', 'Rottweiller'],
        'cats' => ['Abisinio', 'Americano de pelo duro', 'Asiático', 'Balinés', 'Bengalí', 'Birmano', 'Bobtail japonés de pelo corto', 'Bobtail japonés de pelo largo']
    ];

    private $selectedBreed;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'specie_id' => Specie::factory(),
            'nombre' => fake()->unique()->firstName()
        ];
    }

    public function setSpecie(string $specie = 'dogs')
    {
        $this->selectedBreed = $this->breeds[$specie];

        if (!$this->selectedBreed) return;

        return $this->sequence(function (Sequence $sequence) {
            return ['nombre' => $this->selectedBreed[$sequence->index]];
        });
    }
}
