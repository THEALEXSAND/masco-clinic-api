<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [];

    /**
     * Get the customer that owns the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the Medical History associated with the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class);
    }
}
