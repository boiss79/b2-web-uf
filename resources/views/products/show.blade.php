@extends('layouts.app')
@section('title', 'Produit')

@section('content')
    <div class="container my-10">
        @if ($product->owner_id === Auth::id())
            <div class="mb-5 flex items-center">
                <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 rounded shadow text-white py-2 px-3 hover:bg-blue-600">Modifier le produit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="ml-2" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer votre fiche ? Cette action est irréversible.')">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="bg-red-500 p-2 hover:bg-red-600 rounded shadow px-3 py-2 text-white">Supprimer la fiche</button>
                </form>
            </div>
        @endif

        <h2 class="text-2xl lg:text-5xl font-medium mb-3 lg:mb-0">{{ $product->name }}</h2>
        <div class="flex items-center mb-10">
            <a href="{{ route('products.category.index', Str::lower($product->categories->name)) }}" class="mr-2 px-2 py-1 bg-red-600 text-white rounded shadow">{{ $product->categories->name }}</a>
            <p class="text-gray-600">Créé par <a href="{{ route('users.profile.show', $product->owner) }}" class="font-medium">{{ $product->owner->fullName }}</a></p>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div>
                <p class="mb-10">{{ $product->description }}</p>

                @if ($average != 0)
                    <div class="font-medium text-2xl">
                        <p>Note moyenne <span class="text-yellow-500 ml-2">
                            @include('includes.average', ['rating' => $average])
                        </span></p>
                    </div>
                @endif
            </div>
            <div>
                <p class="text-5xl font-medium text-center">{{ $product->price }} &euro;</p>
                <p class="text-center mb-5">disponible immédiatement</p>

                @auth
                    <form method="POST" action="{{route('cart.add')}}">
                        @csrf
                        @method('POST')
                        <input name="id" type="hidden" value="{{$product->id}}">
                        <button class="mb-5 w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900 text-center" type="submit">
                            <i class="fas fa-shopping-basket mr-1"></i>
                            Ajouter au panier
                        </button>
                    </form>
                @else
                    <p class="text-center">
                        <a href="{{ route('login') }}" class="text-blue-500">Connectez-vous</a> ou <a href="{{ route('register') }}" class="text-blue-500">inscrivez-vous</a> pour acheter cette fiche!
                    </p>
                @endauth
            </div>
        </div>

        <h2 class="my-5 text-3xl font-medium">Avis & commentaires</h2>

        @forelse ($comments as $comment)    
            <div class="bg-white shadow rounded-lg border p-5 my-5">
                <div class="flex justify-between mb-5">
                    <div>
                        <div class="flex items-center font-medium text-lg mb-1">
                            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar" class="w-6 h-6 mr-2" />
                            <p>{{ $comment->user->fullName }}</p>
                        </div>
                        <p class="text-gray-600">{{ \Carbon\Carbon::parse($comment->created_at)->format('j F Y') }}</p>
                    </div>
                    <p class="text-green-500 font-medium">&#x2714; Achat vérifié</p>
                </div>
                <p class="mb-5">{{ $comment->content }}</p>
                <p class="font-medium">Note : <span class="text-yellow-500">
                    @include('includes.average', ['rating' => $comment->rating])  
                </span></p>
            </div>
        @empty
            <p>Cette fiche n'a pas de commentaire.</p>
        @endforelse 
    </div>
@endsection
