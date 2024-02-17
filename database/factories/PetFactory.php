<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

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
        $animalType = $this->faker->randomElement(['Perro', 'Gato']);

        $breed = $animalType === 'Perro' ? $this->faker->randomElement(['Labrador', 'Golden Retriever', 'Jack Russell Terrier', 'Chihuahua', 'Husky', 'Dalmata']) : $this->faker->randomElement(['Abisinio', 'Americano de pelo duro', 'Asiático', 'Balinés', 'Bengalí', 'Birmano', 'Bobtail japonés de pelo corto', 'Bobtail japonés de pelo largo']);

        return [
            //
            'customer_id' => Customer::factory(),
            'nombre' => $this->faker->firstName(),
            'raza' => $breed,
            'tipo_animal' => $animalType,
            'sexo' => $this->faker->randomElement(['Macho', 'Hembra']),
            'edad' => $this->faker->numberBetween(1, 14)
        ];
    }
}
