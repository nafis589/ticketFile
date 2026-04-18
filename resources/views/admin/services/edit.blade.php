<x-app-layout>
    @section('header', 'Éditer le Service')

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="p-8">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-slate-900 mb-2">Nom du service</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required 
                           class="block w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50">
                </div>
                
                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-slate-900 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="block w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50">{{ old('description', $service->description) }}</textarea>
                </div>
                
                <div class="mt-8 pt-6 border-t border-slate-100">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <div class="flex items-center h-5">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} 
                                   class="w-5 h-5 rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500 transition-colors">
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-semibold text-slate-900">Service actif</span>
                            <span class="text-sm text-slate-500">Rend le service visible pour que les usagers puissent prendre un ticket</span>
                        </div>
                    </label>
                </div>
            </div>
            
            <div class="bg-slate-50 px-8 py-4 flex items-center justify-end gap-4 border-t border-slate-100">
                <a href="{{ route('admin.services.index') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900 px-4 py-2">Retour</a>
                <button type="submit" class="inline-flex justify-center rounded-xl bg-indigo-600 py-2.5 px-6 text-sm font-bold text-white shadow-sm hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Enregistrer les modifications</button>
            </div>
        </form>
    </div>
</x-app-layout>
