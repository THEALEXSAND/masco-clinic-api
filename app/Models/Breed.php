<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    /**
     * Get all of the pets for the Breed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    /**
     * Get the specie that owns the Breed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
}
