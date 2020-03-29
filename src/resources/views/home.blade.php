@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container mt-20 mb-10">
        <h2 class="text-center text-5xl font-semibold">Des fiches prêtes à l'emploi</h2>

        <div class="my-20">
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <h2 class="text-3xl mb-5">Préparez vos examens en toute sérénité</h2>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente vitae velit amet vel unde aperiam odit veritatis voluptas provident ut suscipit sit ad quisquam a omnis ipsum enim quaerat alias dolor nisi, qui ea nam delectus. Error eligendi totam, dignissimos sunt voluptate eveniet numquam deserunt ab doloribus consequuntur deleniti ipsa aperiam! Molestiae officia esse porro, id ipsam ducimus cumque quia maiores reprehenderit numquam animi rerum voluptatibus, quisquam eum est officiis minus delectus omnis harum illum. Perferendis mollitia quaerat quibusdam, voluptatem amet, delectus dolorem vitae velit accusantium qui architecto consequatur rerum laborum numquam ratione quisquam id quis obcaecati repellat enim labore.</p>
                </div>

                <img src="{{ asset('images/book.svg') }}" alt="Image livre" class="shadow-lg rounded" />
            </div>
        </div>

        <h2 class="text-center text-5xl font-semibold">Nos 3 dernières fiches</h2>

        <div class="my-20 grid grid-cols-3 gap-10">
            @forelse ($products as $product)
                <x-product-card :product="$product" />
            @empty
                <p class="text-center">Il n'y a pas de produit.</p>
            @endforelse
        </div>
    </div>
@endsection
