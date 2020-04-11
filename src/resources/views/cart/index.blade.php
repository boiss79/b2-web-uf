@extends('layouts.app')
@section('title', 'Panier')

@section('content')
    <div class="container my-10">
        <h2 class="text-center text-5xl font-semibold mb-5">Panier</h2>

        @if (!Cart::isEmpty())
            <form method="POST" action="{{ route('cart.clear') }}" class="my-5">
                @csrf
                @method('POST')
                <button class="bg-red-500 rounded shadow text-white py-2 px-3 hover:bg-red-400" type="submit">
                    Vider le panier
                </button>
            </form>

            <table class="bg-white w-full rounded-lg shadow-lg text-sm mb-5">
                <thead class="bg-gray-300">
                    <tr class="border-b-2">
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tl-lg">#</th>
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Nom du produit</th>
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Quantité</th>
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Prix (&euro;)</th>
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tr-lg">Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach (Cart::getContent() as $product)
                        <tr class="border-b">
                            <td class="px-5 py-5">{{ $loop->iteration }}</td>
                            <td class="px-5 py-5">{{ $product->name }}</td>
                            <td class="px-5 py-5">{{ $product->quantity }}</td>
                            <td class="px-5 py-5">{{ $product->price }}</td>
                            <td class="px-5 py-5">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="bg-red-500 rounded shadow px-3 text-white py-2 hover:bg-red-400">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex flex-col items-end">
                <p class="text-5xl text-right">Total : <span class="font-medium">{{ Cart::getTotal() }} &euro;</span></p>
                <a href="{{ route('payment.prepare') }}" class="bg-black rounded shadow text-white text-2xl px-5 py-2 hover:bg-gray-900">Payer</a>
            </div>
        @else
            <p class="text-center">Votre panier est vide. Ajoutez des <a href="{{ route('products.index') }}">produits</a> à votre panier !</p>
        @endif
    </div>
@endsection