@extends('layouts.app')

@section('title', config('app.name', 'TicketFile') . ' — Prenez votre ticket en ligne')

@section('content')

{{-- ======================================================
     HERO SECTION
     ====================================================== --}}
<section class="relative overflow-hidden -mx-4 sm:-mx-6 lg:-mx-8 -mt-8 px-4 sm:px-6 lg:px-8 pt-24 pb-28 bg-white border-b border-slate-100">

    {{-- Refined decorative background elements --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute -top-24 -left-20 w-96 h-96 rounded-full bg-indigo-50/50 blur-3xl"></div>
        <div class="absolute top-20 -right-20 w-80 h-80 rounded-full bg-violet-50/50 blur-3xl"></div>
        {{-- Subtle grid pattern --}}
        <div class="absolute inset-x-0 top-0 h-full w-full bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:32px_32px] [mask-image:radial-gradient(ellipse_50%_50%_at_50%_50%,#000_70%,transparent_100%)] opacity-30"></div>
    </div>

    <div class="relative max-w-4xl mx-auto text-center px-4">

        {{-- Eyebrow badge - Light version --}}
        <div class="inline-flex items-center gap-2 rounded-full bg-indigo-50 border border-indigo-100 px-4 py-1.5 text-sm font-semibold text-indigo-700 mb-10 shadow-sm shadow-indigo-100/50 animate-in fade-in zoom-in duration-700">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            Système opérationnel en temps réel
        </div>

        {{-- Main heading - Bold slate --}}
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tight text-slate-900 leading-[1.1] mb-8">
            <span class="text-indigo-600">TicketFile</span><br>
            La file d'attente réinventée.
        </h1>

        <p class="mt-6 text-xl sm:text-2xl font-medium text-slate-600 leading-relaxed max-w-2xl mx-auto">
            Gagnez du temps. Prenez votre ticket en ligne et suivez votre position sans stress depuis votre smartphone.
        </p>

        {{-- CTA Buttons - Adjusted for white background --}}
        <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-5">

            <a href="{{ route('usager.services.index') }}"
               class="group w-full sm:w-auto inline-flex items-center justify-center gap-2.5 rounded-2xl bg-indigo-600 px-8 py-4.5 text-base font-bold text-white shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 active:scale-95 transition-all duration-200"
               aria-label="Prendre un ticket pour un service disponible">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                          d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
                Prendre mon ticket
                <svg class="w-4 h-4 shrink-0 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            <a href="{{ route('login') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 rounded-2xl bg-white border-2 border-slate-200 px-8 py-4.5 text-base font-bold text-slate-700 hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:ring-4 focus:ring-slate-200 active:scale-95 transition-all duration-200"
               aria-label="Se connecter à votre espace personnel">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                          d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Se connecter
            </a>

        </div>

        {{-- Trust indicators --}}
        <div class="mt-12 pt-8 border-t border-slate-100 flex flex-wrap justify-center items-center gap-x-8 gap-y-4 text-sm font-medium text-slate-400">
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Sans application à l'installer
            </span>
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                Paiement sécurisé
            </span>
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Instantané
            </span>
        </div>

    </div>
</section>

{{-- ======================================================
     COMMENT ÇA MARCHE — 3 étapes
     ====================================================== --}}
<section class="py-20" aria-labelledby="how-it-works-heading">
    <div class="text-center mb-14">
        <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600 mb-3">Simple &amp; rapide</p>
        <h2 id="how-it-works-heading" class="text-3xl sm:text-4xl font-black tracking-tight text-slate-900">
            Comment ça marche ?
        </h2>
        <p class="mt-4 text-lg text-slate-500 max-w-xl mx-auto leading-relaxed">
            En trois étapes, prenez votre ticket et attendez confortablement où vous voulez.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl mx-auto">

        {{-- Étape 1 --}}
        <div class="relative flex flex-col items-center text-center group">
            {{-- Connector line (hidden on mobile) --}}
            <div class="hidden sm:block absolute top-10 left-1/2 w-full h-px bg-gradient-to-r from-transparent via-indigo-200 to-transparent -z-10" aria-hidden="true"></div>

            <div class="relative w-20 h-20 rounded-2xl bg-indigo-50 border-2 border-indigo-100 flex items-center justify-center mb-6 shadow-sm group-hover:scale-105 group-hover:bg-indigo-100 transition-all duration-300">
                <span class="absolute -top-3 -right-3 w-7 h-7 rounded-full bg-indigo-600 text-white text-xs font-black flex items-center justify-center shadow-md" aria-hidden="true">1</span>
                <svg class="w-9 h-9 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Choisir un service</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Consultez la liste des services disponibles et sélectionnez celui dont vous avez besoin.
            </p>
        </div>

        {{-- Étape 2 --}}
        <div class="relative flex flex-col items-center text-center group">
            <div class="relative w-20 h-20 rounded-2xl bg-violet-50 border-2 border-violet-100 flex items-center justify-center mb-6 shadow-sm group-hover:scale-105 group-hover:bg-violet-100 transition-all duration-300">
                <span class="absolute -top-3 -right-3 w-7 h-7 rounded-full bg-violet-600 text-white text-xs font-black flex items-center justify-center shadow-md" aria-hidden="true">2</span>
                <svg class="w-9 h-9 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Obtenir un ticket</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Votre numéro unique est généré instantanément. Aucune inscription requise pour commencer.
            </p>
        </div>

        {{-- Étape 3 --}}
        <div class="relative flex flex-col items-center text-center group">
            <div class="relative w-20 h-20 rounded-2xl bg-emerald-50 border-2 border-emerald-100 flex items-center justify-center mb-6 shadow-sm group-hover:scale-105 group-hover:bg-emerald-100 transition-all duration-300">
                <span class="absolute -top-3 -right-3 w-7 h-7 rounded-full bg-emerald-600 text-white text-xs font-black flex items-center justify-center shadow-md" aria-hidden="true">3</span>
                <svg class="w-9 h-9 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Suivre sa position</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Suivez l'avancement de la file en temps réel depuis n'importe quel appareil, où que vous soyez.
            </p>
        </div>

    </div>
</section>

{{-- ======================================================
     SERVICES DISPONIBLES
     ====================================================== --}}
<section class="py-20 -mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8 bg-slate-50/70 border-y border-slate-100" aria-labelledby="services-heading">
    <div class="max-w-5xl mx-auto">

        <div class="text-center mb-14">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600 mb-3">En ce moment</p>
            <h2 id="services-heading" class="text-3xl sm:text-4xl font-black tracking-tight text-slate-900">
                Services disponibles
            </h2>
            <p class="mt-4 text-lg text-slate-500 max-w-xl mx-auto leading-relaxed">
                Ces services acceptent actuellement des tickets en ligne.
            </p>
        </div>

        @if($services->isNotEmpty())

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                    <article class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:border-indigo-100 transition-all duration-200 p-7 flex flex-col">

                        {{-- Icon --}}
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-5 shadow-sm group-hover:scale-110 group-hover:bg-indigo-100 transition-all duration-200"
                             aria-hidden="true">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>

                        {{-- Content --}}
                        <div class="flex-1">
                            <h3 class="text-base font-bold text-slate-900 mb-2">{{ $service->name }}</h3>

                            @if($service->description)
                                <p class="text-sm text-slate-500 leading-relaxed line-clamp-2">
                                    {{ $service->description }}
                                </p>
                            @else
                                <p class="text-sm text-slate-400 italic">Aucune description disponible.</p>
                            @endif
                        </div>

                        {{-- Status badge --}}
                        <div class="mt-5 flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 border border-emerald-100">
                                <span class="relative flex h-1.5 w-1.5" aria-hidden="true">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                                </span>
                                Ouvert
                            </span>
                        </div>

                        {{-- CTA --}}
                        <a href="{{ route('usager.services.index') }}"
                           class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:scale-95 transition-all duration-200 group/btn"
                           aria-label="Prendre un ticket pour le service {{ $service->name }}">
                            Prendre un ticket
                            <svg class="w-4 h-4 transition-transform duration-200 group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                    </article>
                @endforeach
            </div>

        @else

            {{-- État vide --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-16 text-center">
                <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center mx-auto mb-6" aria-hidden="true">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Aucun service disponible</h3>
                <p class="text-slate-500 max-w-sm mx-auto">
                    Tous les services sont actuellement fermés. Veuillez revenir ultérieurement ou contacter l'administration.
                </p>
            </div>

        @endif

    </div>
</section>

{{-- ======================================================
     FOOTER
     ====================================================== --}}
<footer class="-mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8 py-10 mt-0" role="contentinfo">
    <div class="max-w-5xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">

        {{-- Brand --}}
        <div class="flex items-center gap-2 text-slate-700">
            <svg class="w-5 h-5 text-indigo-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
            </svg>
            <span class="font-bold text-slate-800">TicketFile</span>
        </div>

        {{-- Copyright --}}
        <p class="text-sm text-slate-400">
            &copy; {{ date('Y') }} TicketFile. Tous droits réservés.
        </p>

        {{-- Quick links --}}
        <nav aria-label="Liens du pied de page">
            <ul class="flex items-center gap-6">
                <li>
                    <a href="{{ route('usager.services.index') }}"
                       class="text-sm text-slate-500 hover:text-indigo-600 transition-colors duration-150">
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}"
                       class="text-sm text-slate-500 hover:text-indigo-600 transition-colors duration-150">
                        Connexion
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</footer>

@endsection
