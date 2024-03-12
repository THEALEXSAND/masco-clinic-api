<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\MedicalHistory;
use App\Models\Pet;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(15)
            ->has(Pet::factory()->count(1)->has(MedicalHistory::factory()->hasConsultation(1)))
            ->create();

        Customer::factory()
            ->count(10)
            ->has(Pet::factory()->count(2)->has(MedicalHistory::factory()->hasConsultation(3)))
            ->create();

        Customer::factory()
            ->count(5)
            ->has(Pet::factory()->count(3))
            ->create();
    }
}
