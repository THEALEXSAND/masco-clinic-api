<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'customer_cedula',
        'breed_id',
        'nombre',
        'sexo',
        'fecha_nacimiento'
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
     * Get the breed that owns the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    /**
     * Get the medical history associated with the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }

    /**
     * Get all of the appointments for the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
