<x-app-layout>
    @section('header', 'Tableau de bord Administrateur')

    <div class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 mb-6">Vue d'ensemble de la journée</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Tickets Traités -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center hover:shadow-md transition duration-200">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm uppercase tracking-wider font-semibold text-slate-500">Tickets Traités</p>
                    <p class="text-4xl font-black text-slate-900 mt-1 tracking-tight">{{ $stats['tickets_traites'] }}</p>
                </div>
            </div>
            
            <!-- Tickets Annulés -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center hover:shadow-md transition duration-200">
                <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm uppercase tracking-wider font-semibold text-slate-500">Tickets Annulés</p>
                    <p class="text-4xl font-black text-slate-900 mt-1 tracking-tight">{{ $stats['tickets_annules'] }}</p>
                </div>
            </div>
            
            <!-- Attente Moyenne -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center hover:shadow-md transition duration-200">
                <div class="w-16 h-16 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm uppercase tracking-wider font-semibold text-slate-500">Attente Moyenne</p>
                    <p class="text-4xl font-black text-slate-900 mt-1 tracking-tight">{{ $stats['temps_moyen_attente_min'] }}<span class="text-xl font-semibold text-slate-500 ml-1">min</span></p>
                </div>
            </div>

            <!-- Comptes en attente -->
            <a href="{{ route('admin.users.pending') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center hover:shadow-md hover:border-slate-300 transition duration-200">
                <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm border-b py-2 tracking-wider font-semibold text-slate-500">Comptes en attente</p>
                    <p class="text-4xl font-black text-slate-900 mt-1 tracking-tight">{{ \App\Models\User::where('status', 'en_attente')->count() }}</p>
                </div>
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
        <!-- Raccourcis de gestion -->
        <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-8">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Actions Rapides</h3>
            <div class="space-y-4">
                <a href="{{ route('admin.services.index') }}" class="flex items-center p-4 border border-slate-100 rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-colors group">
                    <div class="bg-slate-100 p-2 rounded-lg group-hover:bg-indigo-50 text-slate-500 group-hover:text-indigo-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-base font-semibold text-slate-900">Gérer les services</p>
                        <p class="text-sm text-slate-500 mt-0.5">Ajouter ou modifier vos services</p>
                    </div>
                    <svg class="w-5 h-5 ml-auto text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
                
                <a href="{{ route('admin.counters.index') }}" class="flex items-center p-4 border border-slate-100 rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-colors group">
                    <div class="bg-slate-100 p-2 rounded-lg group-hover:bg-indigo-50 text-slate-500 group-hover:text-indigo-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-base font-semibold text-slate-900">Gérer les guichets</p>
                        <p class="text-sm text-slate-500 mt-0.5">Assigner des agents aux guichets</p>
                    </div>
                    <svg class="w-5 h-5 ml-auto text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
