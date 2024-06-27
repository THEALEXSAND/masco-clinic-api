<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'cedula';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'cedula',
        'tipo_usuario_id',
        'nombre',
        'correo',
        'contrasena',
    ];

    protected $dates = [
        'creado_en',
        'actualizado_en',
    ];

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'tipo_usuario_id');
    }
}
