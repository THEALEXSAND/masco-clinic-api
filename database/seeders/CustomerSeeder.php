<?php

namespace Database\Seeders;

use App\Models\Consultation;
use App\Models\Customer;
use App\Models\MedicalHistory;
use App\Models\Medicine;
use App\Models\Pet;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = Medicine::factory()->setNames('Febendazol')->create();

        Customer::factory()->has(
            Pet::factory()->count(4)->hasMedicalHistory()->hasAppointments(2)
        )->count(2)->create();

        Customer::factory()->has(
            Pet::factory()->count(2)->hasMedicalHistory()->hasAppointments(1)
        )->count(4)->create();

        Customer::factory()->has(
            Pet::factory()->count(2)->hasMedicalHistory()->hasAppointments(3)
        )->count(5)->create();

        Customer::factory()->has(
            Pet::factory()->count(2)->has(
                MedicalHistory::factory()->hasVaccineRecords(2)->hasConsultations(2)
            )->hasAppointments(2)
        )->count(5)->create();

        Customer::factory()->has(
            Pet::factory()->has(MedicalHistory::factory()->hasVaccineRecords(4)->has(Consultation::factory()->hasAttached($medicines, [
                'cantidad' => 16,
                'indicaciones' => 'Tomar cada 12h (preferiblemente antes de comer)'
            ])->count(3)))
        )->count(6)->create();

        Customer::factory()->has(
            Pet::factory()->has(
                MedicalHistory::factory()->has(Consultation::factory()->hasAttached($medicines, [
                    'cantidad' => 8,
                    'indicaciones' => 'Inyectar 1 ampolla cada 15 dias'
                ])->count(4))
            )
        )->count(6)->create();
    }
}
