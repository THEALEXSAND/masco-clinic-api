<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'observacion'
    ];

    /**
     * Get all of the Consultations for the MedicalHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany(Consultations::class);
    }

    /**
     * Get the Pet that owns the Medical History
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pets()
    {
        return $this->belongsTo(Pet::class);
    }
}
