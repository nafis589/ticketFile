<x-app-layout>
    @section('header', 'Gestion des Services')

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-slate-900">Liste des Services</h2>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-800 transition shadow-sm">
            Nouveau Service
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100">
                @forelse($services as $service)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">#{{ $service->id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $service->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $service->is_active ? 'bg-emerald-100 text-emerald-800 border-[0.5px] border-emerald-200' : 'bg-slate-100 text-slate-800 border-[0.5px] border-slate-200' }}">
                                {{ $service->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 px-3 py-1.5 rounded-lg transition-colors font-semibold">Éditer</a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:text-rose-800 bg-rose-50 px-3 py-1.5 rounded-lg transition-colors font-semibold">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-slate-500">Aucun service trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
