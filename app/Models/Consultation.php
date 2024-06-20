<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_history_id',
        'motivo',
        'descripcion',
        'receta',
        'tratamiento',
        'diagnostico'
    ];

    /**
     * Get the Medical History that owns the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'consulta_id');
    }

    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class);
    }

}
