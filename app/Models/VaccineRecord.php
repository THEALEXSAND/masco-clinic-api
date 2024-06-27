<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'historia_medica_id',
        'nombre_vacuna',
        'fecha_aplicacion',
    ];

    /**
     * Get the medical history that owns the vaccine record.
     */
    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class);
    }
}
