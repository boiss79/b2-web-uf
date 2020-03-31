@extends('admin.layouts.app')

@section('title', 'Utilisateurs')

@section('content')

    <h2 class="text-center text-5xl font-semibold my-10">Administration des produits</h2>

    <div class="w-4/5 mx-auto">
    <div class="bg-white shadow-md rounded my-6">
      <table class="text-left w-full ">
        <thead>
          <tr>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">#</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Propriétaire</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Catégorie</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Description</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $product->id }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $product->title }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $product->owner->first_name }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $product->categories->name }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $product->description }} </td>
                    <td class="py-4 px-6 border-b border-grey-light">
                        <a href="#" class="bg-red-600 rounded p-1 text-white">Supprimer</a>
                        <a href="#" class="bg-green-600 rounded p-1 text-white">Valider</a>
                    </td>
                </tr>
            @empty
            
            @endforelse
        </tbody>
      </table>
    </div>
  </div>

@endsection