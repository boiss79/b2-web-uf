@extends('layouts.app')
@section('title', 'Inscription')

@section('content')
    <div class="container my-10">
        <h2 class="text-center text-5xl font-semibold mb-10">Inscription</h2>
        
        <form method="POST" action="{{ route('register') }}" class="grid grid-cols-2 gap-10">
            @csrf
            @method('POST')

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="col-span-2 text-red-500">{{ $error }}</p>
                @endforeach
            @endif

            <div>
                <label for="first-name" class="font-medium">Prénom</label>
                <input type="text" name="first_name" id="first-name" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre prénom" required />
            </div>

            <div>
                <label for="last-name" class="font-medium">Nom</label>
                <input type="text" name="last_name" id="last-name" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre nom" required />
            </div>
            <div>
                <label for="email" class="font-medium">Email</label>
                <input type="email" name="email" id="email" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre adresse email" required />
            </div>

            <div>
                <label for="birthday" class="font-medium">Date de naissance</label>
                <input type="date" name="birthday" id="birthday" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre nom" required />
            </div>

            <div>
                <label for="password" class="font-medium">Mot de passe</label>
                <input type="password" name="password" id="password" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre mot de passe" required />
            </div>

            <div>
                <label for="password-confirm" class="font-medium">Confirmation du mot de passe</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Retapez votre mot de passe" required />
            </div>

            <button type="submit" class="col-span-2 mb-5 w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900">
                S'inscrire
            </button>
        </form>
    </div>
@endsection
