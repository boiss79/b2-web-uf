@extends('layouts.app')
@section('title', 'Créer un commentaire')

@section('content')
    <div class="container my-10">
        <h2 class="text-5xl font-semibold">Laisser un avis</h2>
        <p>Votre avis compte beaucoup pour nous et nos utilisateurs. Une fiche bien notée sera forcément mieux récompensé qu'une fiche mal notée.</p>

        <p class="my-5 inline-block bg-gray-500 px-3 py-2 shadow rounded-full text-white font-medium">{{ $product->name }}</p>

        <form action="" method="POST">
            <div class="mb-5">
                <label for="content" class="font-medium">Votre commentaire</label>
                <textarea name="content" id="content" rows="6" placeholder="Qu'est-ce que cette fiche vous a apporté ? La recommanderiez-vous ?" class="mt-2 p-3 block w-full border shadow rounded" required></textarea>
            </div>

        </form>
    </div>
@endsection 