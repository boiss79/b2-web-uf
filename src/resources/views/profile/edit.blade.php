@section('title', 'User Edit')
@extends('layouts.app')

@section('content')
    <div class="container my-20">
        <h2 class="text-center text-5xl font-semibold mb-10">Modifier votre profil</h2>
        
        <form method="POST" action="{{ route('profile.update', $user) }}" class="grid grid-cols-2 gap-10">
            @csrf
            @method('PUT')

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="col-span-2 text-red-500">{{ $error }}</p>
                @endforeach
            @endif

            <div>
                <label for="first-name" class="font-medium">Prénom</label>
                <input type="text" name="first_name" id="first-name" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre prénom" value="{{ $user->first_name }}" required />
            </div>

            <div>
                <label for="last-name" class="font-medium">Nom</label>
                <input type="text" name="last_name" id="last-name" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre nom" value="{{ $user->last_name }}" required />
            </div>

            <div class="col-span-2">
                <label for="description" class="font-medium">Description</label>
                <textarea name="description" id="last-name" class="mt-2 p-3 block w-full border shadow rounded" rows="5" placeholder="Présentez-vous à la communauté ;)">{{ $user->description }}</textarea>
            </div>

            <button type="submit" class="col-span-2 mb-5 w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900">
                Enregistrer les modifications
            </button>
        </form>
    </div>
@endsection
