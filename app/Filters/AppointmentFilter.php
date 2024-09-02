<?php

namespace App\Filters;

class AppointmentFilter extends ApiFilter
{
    protected $safeParams = [
        'id' => ['eq', 'like'],
        'petId' => ['eq', 'like'],
        'userIdCard' => ['eq', 'like'],
        'subject' => ['eq', 'like'],
        'dateTime' => ['eq', 'like'],
    ];

    protected $columnMap = [
        'petId' => 'pet_id',
        'userIdCard' => 'user_cedula',
        'subject' => 'asunto',
        'dateTime' => 'fecha_hora',
    ];
}
