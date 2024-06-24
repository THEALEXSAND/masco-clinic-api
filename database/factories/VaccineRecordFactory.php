<?php

namespace Database\Factories;

use App\Models\VaccineRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccineRecordFactory extends Factory
{
    protected $model = VaccineRecord::class;

    public function definition()
    {
        return [
            'historia_medica_id' => \App\Models\MedicalHistory::factory(),
            'nombre_vacuna' => $this->faker->word,
            'fecha_aplicacion' => $this->faker->date,
        ];
    }
}
