<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    use HasFactory;

    protected $fillable = [];

    /**
     * Get the Medical History that owns the Consultations
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class);
    }
}
