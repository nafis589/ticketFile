<x-app-layout>
    @section('header', 'Nouveau Guichet')

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('admin.counters.store') }}" method="POST">
            @csrf
            
            <div class="p-8">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-slate-900 mb-2">Nom du guichet</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                           class="block w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50 placeholder-slate-400"
                           placeholder="Ex: Guichet 1, Accueil B...">
                </div>
                
                <div class="mb-6">
                    <label for="service_id" class="block text-sm font-semibold text-slate-900 mb-2">Service Assigné</label>
                    <select name="service_id" id="service_id" required 
                            class="block w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50">
                        <option value="">Sélectionnez un service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->name }} ({{ $service->is_active ? 'Actif' : 'Inactif' }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="bg-slate-50 px-8 py-4 flex items-center justify-end gap-4 border-t border-slate-100">
                <a href="{{ route('admin.counters.index') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900 px-4 py-2">Retour</a>
                <button type="submit" class="inline-flex justify-center rounded-xl bg-indigo-600 py-2.5 px-6 text-sm font-bold text-white shadow-sm hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Créer le guichet</button>
            </div>
        </form>
    </div>
</x-app-layout>
