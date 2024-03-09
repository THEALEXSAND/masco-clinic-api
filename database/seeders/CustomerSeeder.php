<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
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
            ->has(Pet::factory()->count(1)->hasMedicalHistory())
            ->create();

        Customer::factory()
            ->count(10)
            ->has(Pet::factory()->count(2)->hasMedicalHistory())
            ->create();

        Customer::factory()
            ->count(5)
            ->has(Pet::factory()->count(3))
            ->create();
    }
}
