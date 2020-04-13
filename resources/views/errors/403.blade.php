@extends('layouts.app')
@section('title', 'Erreur 403')

@section('content')
    <div class="container my-10">
        <h2 class="text-3xl lg:text-5xl font-medium">Erreur 403</h2>
        <p>Oops... une erreur est survenue. Vous n'êtres sûrement pas autorisé à accéder à cette ressource. Vous pouvez retourner à la <a href="{{ route('home') }}" class="text-blue-500">page d'accueil</a></p>
    </div>
@endsection 