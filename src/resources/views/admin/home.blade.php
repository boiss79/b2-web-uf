@extends('admin.layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="container my-10">
        <div class="flex items-center my-5">
            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-20 h-20" />
            <h2 class="mx-5 text-5xl font-semibold">Bonjour, {{ Auth::user()->fullName }}</h2>
            <span class="px-3 py-2 rounded-lg bg-red-600 text-white">{{ ucfirst(Auth::user()->getRoleNames()[0]) }}</span>
        </div>
        <p>Vous êtes dans actuellement sur l'interface d'administration du site. Cette dernière est exclusivement réservée aux modérateurs et administrateurs. En fonction de votre rôle, vous aurez accès à différentes ressources qui vous permettront d'administrer le site. Veillez à manipuler les données des utilisateurs avec précaution.</p>
        <h2 class="text-4xl font-semibold mt-5">Statistiques</h2>
        <div class="grid grid-cols-4 gap-10 mt-5">
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-blue-600 px-3 py-2 text-white rounded-full mb-5">Utilisateurs</p>
                <h3 class="text-5xl font-medium">{{ $users->count() }}</h3>
            </div>
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-orange-600 px-3 py-2 text-white rounded-full mb-5">Fiches</p>
                <h3 class="text-5xl font-medium">{{ $products->count() }}</h3>
            </div>
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-green-600 px-3 py-2 text-white rounded-full mb-5">Commentaires</p>
                <h3 class="text-5xl font-medium">{{ $comments->count() }}</h3>
            </div>
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-yellow-600 px-3 py-2 text-white rounded-full mb-5">Catégories</p>
                <h3 class="text-5xl font-medium">{{ $categories->count() }}</h3>
            </div>
        </div>
    </div>


@endsection
