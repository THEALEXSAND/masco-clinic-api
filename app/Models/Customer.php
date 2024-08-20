<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
    ];

    protected $primaryKey = 'cedula';
    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * Get all of the pets for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
