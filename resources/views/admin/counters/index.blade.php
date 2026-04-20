<x-app-layout>
    @section('header', 'Gestion des Guichets')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-900">Liste des Guichets</h2>
        <a href="{{ route('admin.counters.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-800 transition shadow-sm">
            Nouveau Guichet
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nom du guichet</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Service</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Agent Assigné</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100">
                @forelse($counters as $counter)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">#{{ $counter->id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $counter->name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $counter->service->name ?? 'Aucun' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($counter->agent)
                                <div class="flex items-center">
                                    <div class="h-6 w-6 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-xs font-bold mr-2 uppercase">
                                        {{ substr($counter->agent->name, 0, 1) }}
                                    </div>
                                    <span class="text-slate-700 font-medium">{{ $counter->agent->name }}</span>
                                </div>
                            @else
                                <span class="text-slate-400 font-medium italic">Non assigné</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.counters.edit', $counter) }}" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 px-3 py-1.5 rounded-lg transition-colors font-semibold">Éditer</a>
                                <form action="{{ route('admin.counters.destroy', $counter) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce guichet ?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:text-rose-800 bg-rose-50 px-3 py-1.5 rounded-lg transition-colors font-semibold">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">Aucun guichet trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
