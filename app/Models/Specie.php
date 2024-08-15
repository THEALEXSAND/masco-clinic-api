<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    /**
     * Get all of the breeds for the Specie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }
}
