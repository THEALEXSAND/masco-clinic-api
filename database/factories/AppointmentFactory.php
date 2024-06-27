<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'fecha' => $this->faker->date,
            'hora' => $this->faker->time,
            'mascota_id' => Pet::factory(),
            'usuario_cedula' => User::factory(),
            'asunto' => $this->faker->sentence,
            'creado_en' => now(),
            'actualizado_en' => now(),
        ];
    }
}
