<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    protected $fillable = [
        'title',
        'region', 
        'start_date',
        'duration_days',
        'price_per_person'
    ];

    protected $casts = [
        'start_date' => 'date',
        'price_per_person' => 'decimal:2'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}