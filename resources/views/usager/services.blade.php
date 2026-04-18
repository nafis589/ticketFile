<x-app-layout>
    @section('header', 'Choisir un service')

    <div class="max-w-4xl mx-auto">
        <div class="mb-10 text-center">
            <h2 class="text-4xl font-black tracking-tight text-slate-900">Bienvenue</h2>
            <p class="mt-4 text-lg text-slate-600">Sélectionnez le service pour lequel vous souhaitez prendre un ticket.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($services as $service)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition duration-200 p-8 flex flex-col h-full hover:border-indigo-100 group">
                    <div class="flex-1">
                        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-105 transition-transform duration-200">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $service->name }}</h3>
                        <p class="mt-3 text-slate-500 leading-relaxed line-clamp-3">{{ $service->description ?? 'Aucune description fournie pour ce service.' }}</p>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-slate-50">
                        <form method="POST" action="{{ route('usager.tickets.store') }}">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-3.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-sm group-hover:shadow-indigo-200 active:scale-95">
                                Prendre un ticket
                                <svg class="ml-2 w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 p-16 text-center">
                    <svg class="mx-auto h-16 w-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mt-6 text-xl font-semibold text-slate-900">Aucun service disponible</h3>
                    <p class="mt-2 text-slate-500">Veuillez repasser plus tard, aucun service n'est actuellement ouvert pour prendre un ticket.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
