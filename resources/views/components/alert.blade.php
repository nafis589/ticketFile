@if (session('success'))
    <div class="mb-8 p-4 rounded-xl bg-emerald-50 border border-emerald-100 shadow-sm flex items-start gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
        <svg class="w-5 h-5 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <p class="text-emerald-800 font-medium text-sm">{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="mb-8 p-4 rounded-xl bg-rose-50 border border-rose-100 shadow-sm flex items-start gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
        <svg class="w-5 h-5 text-rose-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <p class="text-rose-800 font-medium text-sm">{{ session('error') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="mb-8 p-4 rounded-xl bg-rose-50 border border-rose-100 shadow-sm flex items-start gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
        <svg class="w-5 h-5 text-rose-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <p class="text-rose-800 font-semibold text-sm">Il y a eu des erreurs avec votre demande :</p>
            <ul class="mt-2 list-disc list-inside text-sm text-rose-700 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
