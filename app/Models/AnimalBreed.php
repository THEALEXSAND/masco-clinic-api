<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalBreed extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_type_id',
        'raza'
    ];

    /**
     * Get the animal type that owns the AnimalBreed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animalType()
    {
        return $this->belongsTo(AnimalBreed::class);
    }
}
