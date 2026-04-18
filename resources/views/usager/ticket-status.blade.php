<x-app-layout>
    @section('header', 'Suivi de Ticket')

    @push('styles')
        <!-- T33: Meta refresh -->
        <meta http-equiv="refresh" content="15">
    @endpush

    <div class="max-w-2xl mx-auto py-8">
        <x-ticket-card :ticket="$ticket" :position="$position" />
        
        <div class="mt-10 text-center">
            <p class="text-sm font-medium text-slate-500 flex items-center justify-center gap-2">
                <svg class="w-4 h-4 animate-spin text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                Page actualisée automatiquement toutes les 15 secondes
            </p>
            <a href="{{ route('usager.services.index') }}" class="inline-flex items-center gap-1 mt-6 text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition duration-150">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Prendre un autre ticket
            </a>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ticketStatus = '{{ $ticket->status }}';
                
                // T33: Feedback visuel JS
                if (ticketStatus === 'appele') {
                    // On modifie l'apparence visuelle via le tag HTML (qui a h-full bg-slate-50)
                    const htmlElement = document.documentElement;
                    const bodyElement = document.body;
                    
                    // Remplacer le fond par un fond vert
                    htmlElement.classList.replace('bg-slate-50', 'bg-emerald-50');
                    bodyElement.classList.replace('bg-slate-50', 'bg-emerald-50');
                    
                    // On peut aussi ajouter une classe pour donner du contexte au reste des éléments si besoin
                    document.body.classList.add('ticket-is-called');
                }
            });
        </script>
    @endpush
</x-app-layout>
