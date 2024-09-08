<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;


    /**
     * The consultations that belong to the Medicine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function consultations()
    {
        return $this->belongsToMany(Consultation::class);
    }
}
