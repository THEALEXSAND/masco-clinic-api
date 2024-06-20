<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medicine;

class MedicineFactory extends Factory
{
    protected $model = Medicine::class;

    public function definition(): array
    {
        return [
            'nombre_generico' => $this->faker->word(),
            'nombre_comercial' => $this->faker->word(),
        ];
    }
}
