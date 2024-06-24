<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'antecedentes'
    ];

    /**
     * Get all of the Consultation for the MedicalHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->belongsTo(Pet::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
    
    public function vaccineRecords()
    {
        return $this->hasMany(VaccineRecord::class, 'medical_history_id');
    }
}
