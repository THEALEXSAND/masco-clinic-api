<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\MedicalHistory;
use App\Models\Pet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->has(
            Pet::factory()->count(4)->sequence(['breed_id' => 1], ['breed_id' => 2])->hasMedicalHistory()->hasAppointments(2)
        )->count(2)->create();

        Customer::factory()->has(
            Pet::factory()->count(2)->sequence(['breed_id' => 1], ['breed_id' => 2])->hasMedicalHistory()->hasAppointments(1)
        )->count(4)->create();

        Customer::factory()->has(
            Pet::factory()->count(2)->state(fn() => ['breed_id' => 2])->hasMedicalHistory()->hasAppointments(3)
        )->count(5)->create();

        Customer::factory()->has(
            Pet::factory()->count(2)->state(fn() => ['breed_id' => 1])->has(MedicalHistory::factory()->hasConsultations(2))->hasAppointments(2)
        )->count(5)->create();

        Customer::factory()->has(
            Pet::factory()->state(fn() => ['breed_id' => 2])->has(MedicalHistory::factory()->hasConsultations(3))
        )->count(6)->create();

        Customer::factory()->has(
            Pet::factory()->state(fn() => ['breed_id' => 1])->has(MedicalHistory::factory()->hasConsultations(4))
        )->count(6)->create();
    }
}
