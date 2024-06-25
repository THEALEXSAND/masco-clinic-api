<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VaccineRecord;

class VaccineRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VaccineRecord::factory()->count(10)->create();
    }
}
