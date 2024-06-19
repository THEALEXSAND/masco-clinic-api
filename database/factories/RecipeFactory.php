<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipe;
use App\Models\Consultation;
use App\Models\Medicamento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'consulta_id' => Consultation::factory(),
            'medicamento_id' => "crisis", 
            // Medicamento::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'indicaciones' => $this->faker->sentence()
        ];
    }
}
