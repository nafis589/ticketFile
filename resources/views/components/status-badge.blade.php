@props(['status'])

@php
    $classes = match ($status) {
        'en_attente' => 'bg-amber-100 text-amber-800 border-[0.5px] border-amber-200',
        'appele' => 'bg-indigo-100 text-indigo-800 border-[0.5px] border-indigo-200 animate-pulse',
        'traite' => 'bg-emerald-100 text-emerald-800 border-[0.5px] border-emerald-200',
        'absent' => 'bg-slate-100 text-slate-800 border-[0.5px] border-slate-200',
        'annule' => 'bg-rose-100 text-rose-800 border-[0.5px] border-rose-200',
        default => 'bg-gray-100 text-gray-800 border-[0.5px] border-gray-200',
    };

    $labels = [
        'en_attente' => 'En attente',
        'appele' => 'Appelé',
        'traite' => 'Traité',
        'absent' => 'Absent',
        'annule' => 'Annulé',
    ];

    $label = $labels[$status] ?? $status;
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold shadow-sm {$classes}"]) }}>
    {{ $label }}
</span>
