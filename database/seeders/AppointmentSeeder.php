<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Puedes ajustar el número de registros a crear según tus necesidades
        Appointment::factory()->count(50)->create();
    }
}
