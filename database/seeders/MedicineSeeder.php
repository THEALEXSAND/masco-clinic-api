<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::factory()->setNames()->create();
        Medicine::factory()->setNames('Benazepril')->create();
        Medicine::factory()->setNames('Benzodiacepina')->create();
        Medicine::factory()->setNames('Ketamina')->create();
        Medicine::factory()->setNames('Ivermectina')->create();
    }
}
