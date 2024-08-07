<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'nombre',
        'tipo_animal',
        'raza',
        'sexo',
        'fecha_nacimiento',
    ];

    /**
     * Get the customer that owns the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the Medical History associated with the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }

    public function citas()
    {
        return $this->hasMany(Appointment::class, 'mascota_id');
    }
}
