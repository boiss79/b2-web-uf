@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container my-20">
        <h2 class="text-center text-5xl font-semibold mb-10">{{$product->name}}</h2>
        <div class="grid grid-cols-2 gap-10">
            <div>
                <p class="text-2xl font-medium">Crée par : {{$product->owner->first_name}} {{$product->owner->last_name}}</p>
                <p class="text-2xl font-medium">Catégorie : <a href="{{ route('products.category.index', $product->categories->id) }}" class="text-blue-500 hover:underline">{{$product->categories->name}}</a></p>
                <p class="text-2xl font-medium">Description :</p>
                <p class="text-2xl">{{$product->description}}</p>
            </div>
        </div>

    </div>
@endsection
