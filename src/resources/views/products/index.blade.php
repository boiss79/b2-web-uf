@extends('layouts.app')
@section('title', 'Nos fiches')

@section('content')
    <div class="container my-20">
        <h2 class="text-center text-5xl font-semibold mb-10">Nos fiches</h2>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos quibusdam, temporibus quam cumque architecto animi tenetur perspiciatis asperiores nesciunt fuga praesentium alias nulla eos itaque cupiditate quaerat maxime, provident quas. Voluptas praesentium, dolorem qui impedit repudiandae architecto minima accusantium rem veniam eum! Earum soluta animi maxime eligendi ab saepe optio nam odit voluptates voluptatum similique natus aspernatur, quia aut tempore! Est incidunt reiciendis quibusdam, ad modi fugiat odio ducimus magni maiores aperiam id. Doloremque quo quis deleniti sequi magnam illum nisi molestiae illo, cum nihil voluptatem labore tempore dolor eaque quia? Asperiores earum ullam nostrum laborum nulla at eveniet ex?</p>

        @forelse ($categories as $categorie)
            <h3 class=" text-3xl font-semibold my-5">Nos dernières fiche de {{$categorie->name}}</h3>
            <a href="{{ route('products.category.index', $categorie->id) }}" class="no-underline hover:underline text-blue-500 text-lg">Voir toutes les fiches de la catégorie {{$categorie->name}}</a>
            <div class="my-20 grid grid-cols-3 gap-10">
                @forelse ($categorie->threeProducts as $product)
                    <x-product-card :product="$product" />
                @empty
                    <p class="text-center">Il n'y a pas de produit.</p>
                @endforelse
            </div>
        @empty
            
        @endforelse
    </div>
@endsection
