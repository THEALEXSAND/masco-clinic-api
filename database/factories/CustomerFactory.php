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
            //
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'cedula' => $this->faker->numberBetween(1000000, 50000000),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
        ];
    }
}
