@section('title', 'Mes avis')
@extends('layouts.app')

@section('content')
    <div class="container my-10">
        <h2 class="text-5xl font-semibold">Mes avis</h2>
        <p>Consultez l'ensemble de vos avis & commentaires. Vous pouvez les modifier ou les supprimer.</p>

        @foreach ($comments as $comment)
            <x-comment-card :comment="$comment" />
        @endforeach
    </div>
@endsection
