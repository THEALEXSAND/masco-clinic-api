<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'consulta_id',
        'medicamento_id',
        'cantidad',
        'indicaciones'
    ];

    /**
     * Get the consultation that owns the recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    /**
     * Get the medication that is part of the recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function medicine()
    // {
    //     return $this->belongsTo(Medicamento::class, 'medicamento_id');
    // }
}
