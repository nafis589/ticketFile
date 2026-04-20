<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['name', 'description', 'is_active'])]
class Service extends Model
{
    use HasFactory;
    /**
     * Get the counters associated with the service.
     */
    public function counters(): HasMany
    {
        return $this->hasMany(Counter::class);
    }

    /**
     * Get the tickets associated with the service.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
