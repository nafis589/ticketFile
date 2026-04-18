<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comptes en attente de validation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-alert />
                    
                    @if($users->isEmpty())
                        <p class="text-gray-500">Aucun compte en attente.</p>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="border-b py-2 font-bold">Nom</th>
                                    <th class="border-b py-2 font-bold">Email</th>
                                    <th class="border-b py-2 font-bold">Rôle demandé</th>
                                    <th class="border-b py-2 font-bold">Date d'inscription</th>
                                    <th class="border-b py-2 font-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="border-b py-2">{{ $user->name }}</td>
                                    <td class="border-b py-2">{{ $user->email }}</td>
                                    <td class="border-b py-2"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded">{{ ucfirst($user->role) }}</span></td>
                                    <td class="border-b py-2">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="border-b py-2">
                                        <form action="{{ route('admin.users.approve', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <x-primary-button>Valider</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
