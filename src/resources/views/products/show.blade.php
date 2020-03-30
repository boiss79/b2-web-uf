@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container my-10">
        <h2 class="text-center text-5xl font-semibold mb-10">{{$product->name}}</h2>
        <div class="grid grid-cols-2 gap-10">
            <div>
                <p class="text-2xl font-medium">Crée par : {{$product->owner->first_name}} {{$product->owner->last_name}}</p>
                <p class="text-2xl font-medium">Catégorie : <a href="{{ route('products.category.index', strtolower($product->categories->name)) }}" class="text-blue-500 hover:underline">{{$product->categories->name}}</a></p>
                <p class="text-2xl font-medium"> Prix : {{$product->price}}</p>
                <p class="text-2xl font-medium">Description :</p>
                <p class="text-2xl">{{$product->description}}</p>
            </div>
            <div class="text-center">
                <button href="#" class="mb-5 w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900 text-center">
                    Ajouter au panier
                </button>
            </div>
        </div>
    </div>
@endsection
