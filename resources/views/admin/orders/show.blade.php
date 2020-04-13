@extends('admin.layouts.app')
@section('title', 'Commande détails')

@section('content')
    <div class="container my-10">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-medium text-5xl">Commande #{{ $order->id }}</h2>
                <p>Vous pouvez consulter les détails de la commande.</p>
                <p class="font-medium text-gray-600 mt-3">ACHETEUR : {{ $order->user->full_name }}</p>
            </div>

            <p class="text-5xl font-medium text-right">Total : {{ $order->total_price }} &euro;</p>
        </div>

        <table class="bg-white w-full rounded-lg shadow-lg text-sm mt-10">
            <thead class="bg-gray-300">
                <tr class="border-b-2">
                    <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tl-lg">#</th>
                    <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Produit</th>
                    <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Propriétaire</th>
                    <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Prix (&euro;)</th>
                    <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tr-lg">Voir</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($order->productPurchased as $product)
                    <tr class="border-b">
                        <td class="px-5 py-5">{{ $loop->iteration }}</td>
                        <td class="px-5 py-5">{{ $product->name }}</td>
                        <td class="px-5 py-5">
                            <div class="flex items-center">
                                <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar" class="w-5 h-5 mr-2" />
                                {{ $product->owner->fullName }}
                            </div>
                        </td>
                        <td class="px-5 py-5">{{ $product->price }} &euro;</td>
                        <td class="px-5 py-5">
                            <a href="{{ route('products.show', $product->product_id) }}" target="_blank">
                                <img src="{{ asset('images/icons/eye.svg') }}" alt="Icone oeil" class="w-5 h-5" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 