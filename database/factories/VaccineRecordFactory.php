<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VaccineRecord>
 */
class VaccineRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_vacuna' => fake()->randomElement(['Bivalente', 'Pentavalente', 'Pentavalente (2ª dosis)', 'Rabia']),
            'observacion' => fake()->realText(),
            'fecha_aplicacion' => fake()->dateTimeBetween('-5 years')->format('Y-m-d')
        ];
    }
}
