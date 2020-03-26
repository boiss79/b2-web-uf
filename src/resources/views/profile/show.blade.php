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
                <x-product-card :product="$product" />
            @empty
                <p>Il n'y a pas de produit.</p>
            @endforelse
        </div>
    </div>
@endsection
