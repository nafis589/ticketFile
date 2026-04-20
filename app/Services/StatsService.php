<?php

namespace App\Services;

use App\Models\Ticket;
use Carbon\Carbon;

class StatsService
{
    /**
     * Retourne les statistiques pour la journée en cours.
     * 
     * @return array
     */
    public function getDayStats(): array
    {
        $startOfDay = Carbon::today()->startOfDay();
        $endOfDay = Carbon::today()->endOfDay();

        // Tickets traités du jour
        $treatedCount = Ticket::whereBetween('created_at', [$startOfDay, $endOfDay])
            ->where('status', 'traite')
            ->count();

        // Tickets annulés du jour
        $canceledCount = Ticket::whereBetween('created_at', [$startOfDay, $endOfDay])
            ->where('status', 'annule')
            ->count();

        // Temps moyen d'attente (différence entre created_at et called_at)
        $ticketsCalled = Ticket::whereBetween('created_at', [$startOfDay, $endOfDay])
            ->whereNotNull('called_at')
            ->get();

        $averageWaitTimeInMinutes = $ticketsCalled->avg(function ($ticket) {
            return $ticket->created_at->diffInMinutes($ticket->called_at);
        });

        return [
            'tickets_traites' => $treatedCount,
            'tickets_annules' => $canceledCount,
            'temps_moyen_attente_min' => round((float) $averageWaitTimeInMinutes, 2),
        ];
    }
}
