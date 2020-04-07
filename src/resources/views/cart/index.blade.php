@extends('layouts.app')
@section('title', 'Panier')

@section('content')
    <div class="container my-10">
        <h2 class="text-center text-5xl font-semibold mb-10">Panier</h2>

        @if (!Cart::isEmpty())
            <table class="bg-white w-full rounded-lg shadow-lg text-sm">
                <thead class="bg-gray-300">
                    <tr class="border-b-2">
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tl-lg">#</th>
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Nom du produit</th>
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Quantité</th>
                        <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tr-lg">Prix (&euro;)</th>
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
                                <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <button type="submit" class="bg-red-500 rounded shadow text-white py-2 hover:bg-red-400">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Votre panier est vide. Ajoutez des <a href="{{ route('products.index') }}">produits</a> à votre panier !</p>
        @endif
    </div>
@endsection