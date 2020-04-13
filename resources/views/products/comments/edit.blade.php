@extends('layouts.app')
@section('title', 'Modifier un commentaire')

@section('content')
    <div class="container my-10">
        <h2 class="text-3xl lg:text-5xl font-semibold">Modifier votre commentaire</h2>
        <p>Votre avis compte beaucoup pour nous et nos utilisateurs. Une fiche bien notée sera forcément mieux récompensé qu'une fiche mal notée.</p>

        <p class="my-5 inline-block bg-gray-500 px-3 py-2 shadow rounded-full text-white font-medium">{{ $comment->product->name }}</p>

        <form action="{{ route('products.comments.update', $comment->product_id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="product_id" value="{{ $comment->product_id }}" required />

            <div class="mb-5">
                <label for="content" class="font-medium">Votre commentaire</label>
                <textarea name="content" id="content" rows="6" placeholder="Qu'est-ce que cette fiche vous a apporté ? La recommanderiez-vous ?" class="mt-2 p-3 block w-full border shadow rounded" required>{{ $comment->content }}</textarea>
            </div>

            <div class="mb-5">
                <label for="rating" class="font-medium">Note /5</label>
                <select name="rating" id="rating" class="bg-white mt-2 p-3 block w-full border shadow rounded" required">
                    <option value="">Veuillez choisir une note</option>
                    @for ($i = 1; $i < 6; $i++)
                        <option value="{{ $i }}"@if ($comment->rating === $i) selected @endif>{{ $i }}/5</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="bg-black rounded shadow text-white text-xl py-2 px-3 hover:bg-gray-900">Modifier le commentaire</button>
        </form>
    </div>
@endsection 