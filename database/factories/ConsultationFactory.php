<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medical_history_id' => Pet::factory(),
            'motivo' => $this->faker->text(50),
            'descripcion' => $this->faker->text(),
            'receta' => $this->faker->text(),
            'tratamiento' => $this->faker->text(),
        ];
    }
}
