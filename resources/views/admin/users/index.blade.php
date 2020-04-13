@extends('admin.layouts.app')
@section('title', 'Utilisateurs')

@section('content')
<div class="container my-10">
    <h2 class="text-5xl font-semibold mb-5">Utilisateurs</h2>
    <p>Gestion des utilisateurs. Vous pouvez voir les informations sur les utilisateurs et supprimer des comptes.</p>

    <h2 class="text-4xl font-semibold my-5">Liste des utilisateurs</h2>
    <table class="bg-white w-full rounded-lg shadow-lg text-sm">
        <thead class="bg-gray-300">
            <tr class="border-b-2">
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tl-lg">#</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Nom</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Créé le</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Nb. de fiches</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tr-lg">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr class="border-b">
                    <td class="px-5 py-5">{{ $loop->iteration }}</td>
                    <td class="px-5 py-5">
                        <div class="flex items-center">
                            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar" class="w-5 h-5 mr-2" />
                            {{ $user->fullName }}
                        </div>
                    </td>
                    <td class="px-5 py-5">{{ date('d M Y', strtotime($user->created_at)) }}</td>
                    <td class="px-5 py-5">{{ count($user->products) }}</td>
                    <td class="px-5 py-5">
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-white bg-red-500 rounded-md p-2 hover:bg-red-600 mr-2">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection