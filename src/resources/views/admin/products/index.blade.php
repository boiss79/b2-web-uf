@extends('admin.layouts.app')
@section('title', 'Utilisateurs')

@section('content')
<div class="container my-10">
    <h2 class="text-5xl font-semibold mb-5">Produits</h2>
    <p>Gestion des produits. Vous pouvez éditer, supprimer et approuver des produits en fonction de votre rôle.</p>
    <h2 class="text-4xl font-semibold mt-5">Statistiques</h2>
    <div class="grid grid-cols-4 gap-10 mt-5">
        <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
            <p class="bg-green-600 px-3 py-2 text-white rounded-full mb-5">Nb. fiches appr.</p>
            <h3 class="text-5xl font-medium">{{ $nbApprovedProducts }}</h3>
        </div>
        <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
            <p class="bg-blue-600 px-3 py-2 text-white rounded-full mb-5">Nb. fiches non appr.</p>
            <h3 class="text-5xl font-medium">{{ $nbNotApprovedProducts }}</h3>
        </div>
        <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
            <p class="bg-orange-600 px-3 py-2 text-white rounded-full mb-5">Nb. catégories</p>
            <h3 class="text-5xl font-medium">{{ $categories->count() }}</h3>
        </div>
        <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
            <p class="bg-yellow-600 px-3 py-2 text-white rounded-full mb-5">Nb. commentaires</p>
            <h3 class="text-5xl font-medium">{{ $comments->count() }}</h3>
        </div>
    </div>

    <h2 class="text-4xl font-semibold my-5">Liste des fiches</h2>
    <table class="bg-white w-full rounded-lg shadow-lg text-sm">
        <thead class="bg-gray-300">
            <tr class="border-b-2">
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tl-lg">Produit</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Propriétaire</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Créé le</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tr-lg">Statut</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr class="border-b">
                    <td class="px-5 py-5">{{ $product->name }}</td>
                    <td class="px-5 py-5">
                        <div class="flex items-center">
                            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar" class="w-5 h-5 mr-2" />
                            {{ $product->owner->fullName }}
                        </div>
                    </td>
                    <td class="px-5 py-5">{{ date('d M Y', strtotime($product->created_at)) }}</td>
                    <td class="px-5 py-5">
                        @if ($product->published_at)
                            <div class="inline-flex items-center px-2 py-1 bg-green-200 text-green-500 font-medium rounded-full">
                                <img src="{{ asset('images/icons/check-green.svg') }}" alt="Icone sablier" class="w-4 h-4 mr-2" />
                                <span>Approuvée</span>
                            </div>
                        @else
                            <div class="inline-flex items-center px-2 py-1 bg-blue-200 text-blue-500 font-medium rounded-full">
                                <img src="{{ asset('images/icons/hourglass.svg') }}" alt="Icone sablier" class="w-4 h-4 mr-2" />
                                <span>Non approuvée</span>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection