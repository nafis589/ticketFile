<?php

namespace App\Services;

use App\Models\Ticket;

class TicketNumberService
{
    /**
     * Génère le prochain numéro de ticket (entier) pour la journée en cours.
     * Bien que la spec T10 mentionne "string", la règle stricte du 
     * diagramme de classes impose un stockage "int" pour "ticket_number",
     * nous retournons donc l'entier. Le format A001 est pour la présentation.
     */
    public function generate(int $serviceId): int
    {
        $max = Ticket::whereDate('created_at', today())->max('ticket_number');
        
        return $max ? (int) $max + 1 : 1;
    }

    /**
     * Pour la présentation du ticket avec le préfixe du service
     */
    public function format(int $ticketNumber, string $serviceName): string
    {
        $prefix = strtoupper(substr($serviceName, 0, 1));
        return $prefix . str_pad((string)$ticketNumber, 3, '0', STR_PAD_LEFT);
    }
}
