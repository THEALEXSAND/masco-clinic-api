<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\Medicine;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inicializar el generador de datos falsos (faker)
        $faker = \Faker\Factory::create();

        // Obtener todas las consultas
        $consultations = Consultation::all();

        // Iterar sobre cada consulta
        foreach ($consultations as $consultation) {
            // Crear una receta para cada consulta
            Recipe::factory()
                ->count(rand(1, 3)) // Puedes ajustar el número de recetas por consulta aquí
                ->create([
                    'consulta_id' => $consultation->id,
                    'medicamento_id' => Medicine::factory()->create()->id, // Crear un medicamento para cada receta
                    'cantidad' => $faker->numberBetween(1, 10),
                    'indicaciones' => $faker->text(),
                ]);
        }
    }
}
