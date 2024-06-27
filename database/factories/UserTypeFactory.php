<?php

namespace Database\Factories;

use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTypeFactory extends Factory
{
    protected $model = UserType::class;

    public function definition()
    {
        static $userTypes = ['veterinario', 'recepcionista', 'admin'];
        static $index = 0;

        return [
            'nombre' => $userTypes[$index++ % count($userTypes)],
        ];
    }
}
