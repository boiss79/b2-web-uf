@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container my-10">
    <h2 class="text-center text-3xl lg:text-5xl font-semibold mb-10">Nos fiches de {{ $category->name }}</h2>

        <div class="my-10 grid lg:grid-cols-3 gap-10">  
            @forelse ($products as $product)
                <x-product-card :product="$product" />
            @empty
                <p>Il n'y a pas de produit.</p>
            @endforelse
        </div>
    </div>
@endsection
