@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container my-20">
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
                <div class="bg-white rounded shadow-lg border p-10 flex flex-col items-center">
                    <p class="bg-blue-600 px-2 py-1 text-white rounded-lg mb-5">{{ $product->categories->name }}</p>
                    <h3 class="text-2xl font-medium mb-5">{{ $product->name }}</h3>
                    <p class="text-yellow-500 text-3xl mb-5">&#x2605; &#x2605; &#x2605; &#x2605; &#x2606;</p>
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-10 h-10 mr-3" />
                        <p class="ml-3">par <strong>{{ $product->owner->first_name }} {{ $product->owner->last_name }}</strong></p>
                    </div>
                </div>
            @empty
                <p class="text-center">Il n'y a pas de produit.</p>
            @endforelse
        </div>
    </div>
@endsection
