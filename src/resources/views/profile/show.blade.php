@section('title', 'User')
@extends('layouts.app')

@section('content')
    <div class="container my-20">
        <div class="flex items-center mb-10">
            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-20 h-20 mr-5" />
            <h2 class="text-5xl font-semibold">{{ $profile->full_name }}</h2>
        </div>

        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni hic quo eligendi laboriosam velit quae amet neque beatae aperiam numquam suscipit in sint corrupti nostrum quisquam quia sit sapiente minus recusandae, possimus doloremque odit aut corporis veniam. Facilis esse repellat cum ut deleniti sed nesciunt aliquid architecto sint ipsam dolores sequi maxime, mollitia unde tenetur fugiat ad obcaecati, odio, debitis officiis nobis vero asperiores repellendus quaerat? Officiis, ducimus! Repellat soluta quidem possimus vel qui, itaque libero, accusamus consequuntur mollitia sint ducimus laboriosam modi debitis porro voluptate alias in omnis facere nemo. Dignissimos, delectus. Labore sed voluptatibus odio incidunt architecto temporibus?</p>

        <h2 class="text-5xl font-semibold my-10">Fiches publiées</h2>
        
        <div class="grid grid-cols-3 gap-10">
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
                <p>Il n'y a pas de produit.</p>
            @endforelse
        </div>
    </div>
@endsection
