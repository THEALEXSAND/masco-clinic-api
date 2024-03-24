<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo'
    ];

    /**
     * Get all of the breeds for the AnimalType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function breeds()
    {
        return $this->hasMany(AnimalBreed::class);
    }
}
