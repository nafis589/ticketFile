<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TicketFile') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="h-full font-sans antialiased text-slate-900 bg-slate-50 flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white border-b border-slate-200 shadow-sm shrink-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 relative">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center shadow-none">
                            <a href="/" class="text-xl font-bold text-indigo-600 flex items-center gap-2">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                                TicketFile
                            </a>
                        </div>

                        <!-- Main Nav Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            @guest
                                <a href="{{ route('usager.services.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('usager.services.index') ? 'border-indigo-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    Prendre un ticket
                                </a>
                            @endguest

                            @auth
                                @role('usager')
                                    <a href="{{ route('usager.services.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('usager.*') ? 'border-indigo-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                        Nouveau Ticket
                                    </a>
                                @endrole

                                @role('agent')
                                    <a href="{{ route('agent.queue') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('agent.queue') ? 'border-indigo-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                        Mon Guichet
                                    </a>
                                @endrole

                                @role('admin')
                                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-indigo-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                        Tableau de bord
                                    </a>
                                    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.services.*') ? 'border-indigo-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                        Services
                                    </a>
                                    <a href="{{ route('admin.counters.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.counters.*') ? 'border-indigo-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                        Guichets
                                    </a>
                                @endrole
                            @endauth
                        </div>
                    </div>

                    <!-- User / Auth Links -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6 gap-4">
                        @auth
                            <div class="relative flex items-center gap-4">
                                <span class="text-sm font-medium text-slate-500">{{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-sm text-slate-500 hover:text-slate-800 transition duration-150 ease-in-out py-2">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-slate-500 hover:text-slate-800 font-medium transition duration-150 ease-in-out">Connexion</a>
                            <a href="{{ route('register') }}" class="text-sm bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 font-medium transition duration-150 ease-in-out">S'inscrire</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        @hasSection('header')
            <header class="bg-white shadow-sm shrink-0 border-b border-slate-100">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold text-slate-900 tracking-tight">@yield('header')</h1>
                </div>
            </header>
        @endif
        @isset($header)
            <header class="bg-white shadow-sm shrink-0 border-b border-slate-100">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-1 max-w-7xl w-full mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <x-alert />
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        @stack('scripts')
    </body>
</html>
