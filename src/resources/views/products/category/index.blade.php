@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container my-10">
    <h2 class="text-center text-5xl font-semibold mb-10">Nos fiches de {{ $category->name }}</h2>

        <div class="my-20 grid grid-cols-3 gap-10">
            
            @forelse ($products as $product)
                <div class="bg-white rounded shadow-lg border p-10 flex flex-col items-center">
                    <a href="{{Route('products.show', $product->id)}}"></a>
                    <p class="bg-blue-600 px-2 py-1 text-white rounded-lg mb-5">{{ $product->categories->name }}</p>
                    <h3 class="text-2xl font-medium mb-5">{{ $product->name }}</h3>
                    <p class="text-yellow-500 text-3xl mb-5">&#x2605; &#x2605; &#x2605; &#x2605; &#x2606;</p>
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-10 h-10 mr-3" />
                        <p class="ml-3">par <strong>{{ $product->owner->first_name }} {{ $product->owner->last_name }}</strong></p>
                    </div>
                    </a>
                </div>
            @empty
                
            @endforelse
        </div>

@endsection
