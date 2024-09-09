<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    private $medicines = [
        'Acepromacina' => ['ACEDAN Gotas', 'ACEDAN Inyectable'],
        'Benazepril' => ['Cardial B'],
        'Benzodiacepina' => ['DOZILAM'],
        'Ketamina' => ['KETAMID'],
        'Ivermectina' => ['IVERMECTINA'],
        'Febendazol' => ['TOTAL FULL CG Perros y Gatos', 'TOTAL FULL LC Perros', 'TOTAL FULL LC Gatos']
    ];

    private $selectedMedicines;
    private $selectedGenericName;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            //
        ];
    }

    public function setNames(string $genericName = 'Acepromacina')
    {
        $this->selectedMedicines = $this->medicines[$genericName];
        $this->selectedGenericName = $genericName;

        if (!$this->selectedMedicines) return;

        return $this->sequence(function (Sequence $sequence) {
            return [
                'nombre_generico' => $this->selectedGenericName,
                'nombre_comercial' => $this->selectedMedicines[$sequence->index]
            ];
        })->count(count($this->selectedMedicines));
    }
}
