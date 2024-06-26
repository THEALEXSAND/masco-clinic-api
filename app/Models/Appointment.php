<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'mascota_id',
        'usuario_cedula',
        'asunto',
    ];

    public function mascota()
    {
        return $this->belongsTo(Pet::class, 'mascota_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_cedula', 'cedula');
    }
}
