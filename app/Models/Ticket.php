<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable([
    'ticket_number',
    'service_id',
    'counter_id',
    'user_id',
    'status',
    'called_at',
    'treated_at'
])]
class Ticket extends Model
{
    use HasFactory;
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'called_at' => 'datetime',
            'treated_at' => 'datetime',
        ];
    }

    /**
     * Scope a query to only include tickets created today.
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope a query to only include tickets with a certain status.
     */
    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to only include pending tickets.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'en_attente');
    }

    /**
     * Get the service that the ticket belongs to.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the counter that the ticket is assigned to.
     */
    public function counter(): BelongsTo
    {
        return $this->belongsTo(Counter::class);
    }

    /**
     * Get the user that took the ticket.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
