<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VaccineRecord;

class VaccineRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Puedes ajustar el número de registros a crear según tus necesidades
        VaccineRecord::factory()->count(50)->create();
    }
}
