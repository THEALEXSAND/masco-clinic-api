<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\Customer;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['Macho', 'Hembra']);

        $name = $gender === 'Hembra' ? fake()->firstNameFemale() : fake()->firstNameMale();

        return [
            'customer_cedula' => Customer::factory(),

            'nombre' => $name,
            'sexo' => $gender,
            'fecha_nacimiento' => fake()->dateTimeBetween('-14 years')->format('Y-m-d')
        ];
    }

    /* Work in Progress --> public function configure()
    {
        return $this->afterCreating(function (Pet $pet) {

        });
    }
    */
}
