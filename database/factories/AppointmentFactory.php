<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all('cedula')->pluck('cedula');

        return [
            'user_cedula' => fake()->randomElement($users),
            'asunto' => fake()->sentence(),
            'fecha_hora' => fake()->dateTimeBetween('-1 years')
        ];
    }
}
