<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'cedula';
    protected $keyType = 'string';

    public $incrementing = false;


    /**
     * Get all of the appointments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get all of the consultations for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'foreign_key', 'local_key');
    }

    /**
     * Get the user type that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }
}
