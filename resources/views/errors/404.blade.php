@extends('layouts.app')
@section('title', 'Erreur 404')

@section('content')
    <div class="container my-10">
        <h2 class="text-3xl lg:text-5xl font-medium">Erreur 404</h2>
        <p>Oops... une erreur est survenue. Vous pouvez retourner à la <a href="{{ route('home') }}" class="text-blue-500">page d'accueil</a></p>
    </div>
@endsection 