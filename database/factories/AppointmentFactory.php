<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'mascota_id' => Pet::factory(),
            'usuario_cedula' => User::factory(),
            'asunto' => $this->faker->sentence(),
            // 'creadoEn'=> $this-> now(),
            // 'actualizadoEn'=> $this-> now()
        ];
    }
}
