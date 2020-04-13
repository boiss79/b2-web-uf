@extends('layouts.app')

@section('content')
<div class="container my-10">
    <h2 class="text-3xl lg:text-5xl font-medium">Réinitialisation du mot de passe</h2>
    <p>Vous avez perdu votre mot de passe ? Pas de panique, remplissez le formulaire ci-dessous.</p>

    <form method="POST" action="{{ route('password.email') }}" class="mt-10">
        @csrf

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="col-span-2 text-red-500">{{ $error }}</p>
            @endforeach
        @endif

        <div class="mb-5">
            <label for="email" class="font-medium">Adresse email</label>
            <input id="email" type="email" class="mt-2 p-3 block w-full border shadow rounded" name="email" value="{{ old('email') }}" placeholder="Entrez votre adresse email" required autocomplete="email" autofocus />
        </div>

        <button type="submit" class="bg-black rounded shadow text-white text-lg lg:text-2xl py-2 px-3 hover:bg-gray-900">
            Envoyer un lien de réinitialisation du mot de passe
        </button>
    </form>
</div>
@endsection
