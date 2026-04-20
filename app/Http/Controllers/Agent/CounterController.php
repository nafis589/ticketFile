<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Ticket;
use Illuminate\Support\Facades\Gate;

class CounterController extends Controller
{
    public function queue()
    {
        $counter = Counter::where('agent_user_id', auth()->id())->firstOrFail();
        
        $tickets = Ticket::where('service_id', $counter->service_id)
            ->whereIn('status', ['en_attente', 'appele'])
            ->orderBy('id')
            ->paginate(50);
            
        return view('agent.queue', compact('counter', 'tickets'));
    }
    
    public function call(Counter $counter)
    {
        Gate::authorize('manage', $counter);
        
        $ticket = Ticket::where('service_id', $counter->service_id)
            ->where('status', 'en_attente')
            ->orderBy('created_at', 'asc')
            ->first();
            
        if ($ticket) {
            $ticket->update([
                'status' => 'appele',
                'called_at' => now(),
                'counter_id' => $counter->id,
            ]);
            return redirect()->back()->with('success', 'Ticket appelé.');
        }
        
        return redirect()->back()->with('error', 'Aucun ticket en attente.');
    }
    
    public function treat(Counter $counter, Ticket $ticket)
    {
        Gate::authorize('manage', $counter);
        
        $ticket->update([
            'status' => 'traite',
            'treated_at' => now(),
        ]);
        
        return redirect()->back()->with('success', 'Ticket traité.');
    }
    
    public function absent(Counter $counter, Ticket $ticket)
    {
        Gate::authorize('manage', $counter);
        
        $ticket->update([
            'status' => 'absent',
            'treated_at' => now(),
        ]);
        
        return redirect()->back()->with('success', 'Ticket marqué absent.');
    }
}
