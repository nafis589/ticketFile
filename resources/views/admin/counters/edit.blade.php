<x-app-layout>
    @section('header', 'Éditer le Guichet - ' . $counter->name)

    <div class="max-w-2xl">
        <!-- Informations du Guichet -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-8">
            <div class="px-8 py-6 border-b border-slate-100 bg-slate-50">
                <h3 class="text-lg font-bold text-slate-900">Informations Générales</h3>
            </div>
            <form action="{{ route('admin.counters.update', $counter) }}" method="POST">
                @csrf
                @method('PUT')            
                <div class="p-8">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-slate-900 mb-2">Nom du guichet</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $counter->name) }}" required 
                               class="block w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50">
                    </div>
                    
                    <div class="mb-6">
                        <label for="service_id" class="block text-sm font-semibold text-slate-900 mb-2">Service</label>
                        <select name="service_id" id="service_id" required 
                                class="block w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', $counter->service_id) == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="bg-slate-50 px-8 py-4 flex items-center justify-end transition border-t border-slate-100">
                    <button type="submit" class="inline-flex justify-center rounded-xl bg-indigo-600 py-2.5 px-6 text-sm font-bold text-white shadow-sm hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Enregistrer</button>
                </div>
            </form>
        </div>

        <!-- Assignation d' Agent -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 bg-slate-50">
                <h3 class="text-lg font-bold text-slate-900">Agent Assigné</h3>
            </div>
            <form action="{{ route('admin.counters.assignAgent', $counter) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="p-8">
                    <div class="mb-4">
                        <label for="agent_user_id" class="block text-sm font-semibold text-slate-900 mb-2">Sélectionner un agent</label>
                        <select name="agent_user_id" id="agent_user_id" 
                                class="block w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50">
                            <option value="">-- Aucun agent --</option>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" {{ old('agent_user_id', $counter->agent_user_id) == $agent->id ? 'selected' : '' }}>
                                    {{ $agent->name }} ({{ $agent->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="bg-slate-50 px-8 py-4 flex items-center justify-between border-t border-slate-100 border-b border-slate-50">
                    <a href="{{ route('admin.counters.index') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Retour</a>
                    <button type="submit" class="inline-flex justify-center rounded-xl bg-indigo-600 py-2.5 px-6 text-sm font-bold text-white shadow-sm hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Assigner l'agent</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
