<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipe;
use App\Models\Consultation;
use App\Models\Medicine;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'consulta_id' => Consultation::factory(),
            'medicamento_id' => Medicine::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'indicaciones' => $this->faker->text(),
        ];
    }
}
