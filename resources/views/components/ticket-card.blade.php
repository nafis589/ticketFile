@props(['ticket', 'position' => null])

<div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition duration-200 relative">
    <div class="p-6">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-4xl font-black text-slate-900 tracking-tight">{{ $ticket->ticket_number }}</h3>
                <p class="text-sm font-medium text-slate-500 mt-1 uppercase tracking-wider">{{ $ticket->service->name ?? 'Service Inconnu' }}</p>
            </div>
            <x-status-badge :status="$ticket->status" />
        </div>
        
        @if($position !== null && $ticket->status === 'en_attente')
            <div class="mt-6 pt-6 border-t border-slate-50 flex items-center justify-between">
                <div>
                    <p class="text-xs text-slate-400 uppercase tracking-wider font-semibold">Position</p>
                    <p class="text-3xl font-bold mt-1 {{ $position == 1 ? 'text-indigo-600' : 'text-slate-700' }}">{{ $position }}</p>
                </div>
                @if($position == 1)
                    <div class="flex items-center text-sm font-medium text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">
                        Vous êtes le prochain !
                    </div>
                @endif
            </div>
        @endif
        
        @if($ticket->status === 'appele')
            <div class="mt-6 p-4 bg-indigo-50 border border-indigo-100 rounded-xl shadow-inner">
                <p class="text-sm text-indigo-800 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 shrink-0 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-8.155a1.76 1.76 0 00-1.579-1.328l-3.085-.308A1.76 1.76 0 010 8.283V5.882a1.76 1.76 0 011.76-1.76h8.48a1.76 1.76 0 011.76 1.76z"></path></svg>
                    Veuillez vous rendre au guichet {{ $ticket->counter->name ?? 'immédiatement' }}
                </p>
            </div>
        @endif
        
        @if($slot->isNotEmpty())
            <div class="mt-6 pt-4 border-t border-slate-50 flex gap-3">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
