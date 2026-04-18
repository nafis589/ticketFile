<x-app-layout>
    @section('header', 'Gestion de la File d\'Attente - ' . $counter->name)

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Section: Actions du Guichet -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm lg:sticky lg:top-6">
                <h2 class="text-lg font-bold text-slate-900 mb-6">Contrôle du Guichet</h2>
                
                <form action="{{ route('agent.counters.call', $counter) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-bold rounded-xl shadow-sm transition-all text-lg flex justify-center items-center gap-2 transform active:scale-95">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-8.155a1.76 1.76 0 00-1.579-1.328l-3.085-.308A1.76 1.76 0 010 8.283V5.882a1.76 1.76 0 011.76-1.76h8.48a1.76 1.76 0 011.76 1.76z"></path></svg>
                        Appeler au guichet
                    </button>
                </form>
                
                <div class="mt-8 pt-6 border-t border-slate-50 flex flex-col gap-4">
                    <div>
                        <p class="text-xs uppercase tracking-wider font-semibold text-slate-500">Service concerné</p>
                        <p class="text-base font-semibold text-slate-900 mt-1">{{ $counter->service->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Liste des tickets -->
        <div class="w-full lg:w-2/3 space-y-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-slate-900">Tickets en attente et appelés</h2>
                <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full border border-indigo-100 shadow-sm">{{ $tickets->total() }} total</span>
            </div>

            @forelse($tickets as $ticket)
                <x-ticket-card :ticket="$ticket">
                    @if($ticket->status === 'appele' && $ticket->counter_id === $counter->id)
                        <form action="{{ route('agent.counters.treat', [$counter, $ticket]) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-sm transition-colors flex justify-center items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Traité
                            </button>
                        </form>
                        <form action="{{ route('agent.counters.absent', [$counter, $ticket]) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full py-3 bg-white hover:bg-slate-50 text-slate-700 text-sm font-semibold rounded-xl shadow-sm transition-colors flex justify-center items-center gap-2 border border-slate-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                Absent
                            </button>
                        </form>
                    @endif
                </x-ticket-card>
            @empty
                <div class="bg-white border text-center border-slate-100 shadow-sm rounded-2xl p-16">
                    <div class="mx-auto w-16 h-16 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900">La file est vide</h3>
                    <p class="text-sm text-slate-500 mt-2">Aucun ticket n'est en attente pour le moment.</p>
                </div>
            @endforelse

            <div class="mt-8">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
