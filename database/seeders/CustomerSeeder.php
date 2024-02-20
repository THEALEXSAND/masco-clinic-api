<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(15)
            ->hasPets(1)
            ->create();

        Customer::factory()
            ->count(10)
            ->hasPets(2)
            ->create();

        Customer::factory()
            ->count(5)
            ->hasPets(3)
            ->create();
    }
}
