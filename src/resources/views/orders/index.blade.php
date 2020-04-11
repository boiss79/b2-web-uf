@section('title', 'Mes achats')
@extends('layouts.app')

@section('content')
    <div class="container my-10">
        <h2 class="text-5xl font-semibold">Mes achats</h2>
        <p>Consultez l'ensemble de vos commandes. Vous pourrez télécharger vos produits et consulter les détails de vos commandes.</p>

        @foreach ($orders as $order)
            <x-order-card :order="$order" :index="$loop->remaining + 1" />
        @endforeach
    </div>
@endsection
