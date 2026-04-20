<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['name', 'service_id', 'agent_user_id'])]
class Counter extends Model
{
    use HasFactory;
    /**
     * Get the service that owns the counter.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the user (agent) assigned to the counter.
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_user_id');
    }

    /**
     * Get the tickets handled by this counter.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
