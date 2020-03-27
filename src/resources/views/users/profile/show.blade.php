@section('title', 'User')
@extends('layouts.app')

@section('content')
    <div class="container my-20">
        @if (Auth::id() === $user->id)
            <a href="{{ route('users.profile.edit') }}" class="inline-block mb-10 bg-black rounded shadow text-white py-2 px-3 hover:bg-gray-900">Modifier mon profil</a>
        @endif

        <div class="flex items-center mb-10">
            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-20 h-20 mr-5" />
            <h2 class="text-5xl font-semibold">{{ $user->full_name }}</h2>
        </div>
        
        @if ($user->description)
            {{ $user->description }}
        @else
            <p>Cette utilisateur n'a pas de description.</p>
        @endif

        <h2 class="text-5xl font-semibold my-10">Fiches publiées</h2>
        
        <div class="grid grid-cols-3 gap-10">
            @forelse ($products as $product)
                <x-product-card :product="$product" />
            @empty
                <p>Il n'y a pas de produit.</p>
            @endforelse
        </div>
    </div>
@endsection
