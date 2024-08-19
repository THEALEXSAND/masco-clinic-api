<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users =  User::all('cedula')->pluck('cedula');

        return [
            'user_cedula' => fake()->randomElement($users),
            'descripcion' => fake()->realText(255),
            'observacion' => fake()->sentence(10),
            'diagnostico' => fake()->sentence(15),
        ];
    }
}
