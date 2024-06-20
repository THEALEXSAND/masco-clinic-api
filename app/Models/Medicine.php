<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_generico',
        'nombre_comercial',
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
