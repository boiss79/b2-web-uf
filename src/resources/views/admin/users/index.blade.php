@extends('admin.layouts.app')

@section('title', 'Utilisateurs')

@section('content')

    <h2 class="text-center text-5xl font-semibold my-10">Administration des utilisateurs</h2>

    <div class="w-4/5 mx-auto">
    <div class="bg-white shadow-md rounded my-6">
      <table class="text-left w-full ">
        <thead>
          <tr>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">#</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Prénom</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nombre de Fiches</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Description</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $user->id }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $user->last_name }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $user->first_name }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $user->products->count() }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $user->description }} </td>
                    <td class="py-4 px-6 border-b border-grey-light">
                        <a href="#" class="bg-red-600 rounded p-1 text-white">Supprimer</a>
                    </td>
                </tr>
            @empty
            
            @endforelse
        </tbody>
      </table>
    </div>
  </div>

@endsection