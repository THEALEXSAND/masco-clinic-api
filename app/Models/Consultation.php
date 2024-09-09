<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_history_id',
        'user_cedula',
        'descripcion',
        'observacion',
        'diagnostico',
    ];

    /**
     * The medicines that belong to the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'recipes')->as('recipe')->withPivot(['cantidad', 'indicaciones']);
    }

    /**
     * Get the medical history that owns the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicalHistory()
    {
        return $this->belongsTo(MedicalHistory::class);
    }

    /**
     * Get the user that owns the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
