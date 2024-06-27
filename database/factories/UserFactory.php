<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        // Obtenemos todos los tipos de usuario para asignar uno aleatoriamente
        $userTypes = UserType::all()->pluck('id')->toArray();

        return [
            'cedula' => $this->faker->unique()->randomNumber(8),
            'tipo_usuario_id' => $this->faker->randomElement($userTypes),
            'nombre' => $this->faker->name,
            'correo' => $this->faker->unique()->safeEmail,
            'contrasena' => bcrypt('password'), // O puedes usar Hash::make('password')
        ];
    }
}
