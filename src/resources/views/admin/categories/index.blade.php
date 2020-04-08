@extends('admin.layouts.app')
@section('title', 'Utilisateurs')

@section('content')
<div class="container my-10">
    <h2 class="text-5xl font-semibold mb-5">Catégories</h2>
    <p>Gestion des catégories. Vous pouvez éditer, supprimer et ajouter des catégories de produit.</p>

    <a href="{{ route('admin.categories.create') }}" class="inline-block mt-5 bg-black rounded shadow text-white text-xl py-2 px-3 hover:bg-gray-900">Créer une catégorie</a>
    
    <table class="bg-white w-full rounded-lg shadow-lg text-sm mt-10">
        <thead class="bg-gray-300">
            <tr class="border-b-2">
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tl-lg">#</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Nom</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Dernière modification</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tr-lg">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr class="border-b">
                    <td class="px-5 py-5">{{ $loop->iteration }}</td>
                    <td class="px-5 py-5">{{ $category->name }}</td>
                    <td class="px-5 py-5">{{ date('d M Y', strtotime($category->updated_at)) }}</td>
                    <td class="px-5 py-5">
                        <div class="flex">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="inline-block mr-2 text-blue-500">Modifier</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection