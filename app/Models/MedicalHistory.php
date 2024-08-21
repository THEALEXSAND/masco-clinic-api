<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pet_id',
        'antecedentes'
    ];

    /**
     * Get the pet that owns the MedicalHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * Get all of the consultations for the MedicalHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
