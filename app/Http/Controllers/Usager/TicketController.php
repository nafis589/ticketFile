<?php

namespace App\Http\Controllers\Usager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use App\Services\TicketNumberService;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function store(StoreTicketRequest $request, TicketNumberService $ticketNumberService)
    {
        $serviceId = $request->validated('service_id');
        $userId = auth()->check() ? auth()->id() : null;
        
        $ticket_number = $ticketNumberService->generate($serviceId);
        
        $ticket = Ticket::create([
            'ticket_number' => $ticket_number,
            'service_id' => $serviceId,
            'user_id' => $userId,
            'status' => 'en_attente',
        ]);
        
        return redirect()->route('usager.tickets.show', $ticket);
    }
    
    public function show(Ticket $ticket)
    {
        $position = Ticket::where('service_id', $ticket->service_id)
            ->where('status', 'en_attente')
            ->where('id', '<', $ticket->id)
            ->count() + 1;
            
        return view('usager.ticket-status', compact('ticket', 'position'));
    }
}
