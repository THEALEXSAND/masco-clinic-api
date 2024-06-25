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

    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class);
    }
}
