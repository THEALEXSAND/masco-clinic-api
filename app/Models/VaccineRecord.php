<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'medical_history_id',
        'nombre_vacuna',
        'observacion',
        'fecha_aplicacion'
    ];

    /**
     * Get the medicalHistory that owns the VaccineRecord
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class);
    }
}
