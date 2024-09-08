<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cedula' => fake()->unique()->numberBetween(100000, 5000000),
            'nombre' => fake()->firstName(),
            'apellido' => fake()->lastName(),
            'direccion' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
        ];
    }
}
