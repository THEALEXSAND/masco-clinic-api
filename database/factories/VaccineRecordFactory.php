<?php

namespace Database\Factories;

use App\Models\VaccineRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccineRecordFactory extends Factory
{
    protected $model = VaccineRecord::class;

    public function definition()
    {
        $vacunas = [
            'Moquillo',
            'Hepatitis infecciosa canina',
            'Parvovirus canino',
            'Parainfluenza',
            'Rabia',
            'Herpesvirus felino',
            'Calicivirus felino',
            'Panleucopenia felina',
            'Leptospirosis',
            'Bordetella bronchiseptica',
            'Virus de la leucemia felina',
            'Clamidiosis felina'
        ];

        return [
            'historia_medica_id' => \App\Models\MedicalHistory::factory(),
            'nombre_vacuna' => $this->faker->randomElement($vacunas),
            'fecha_aplicacion' => $this->faker->date,
        ];
    }
}
