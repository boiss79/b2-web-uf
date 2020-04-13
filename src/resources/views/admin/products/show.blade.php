@extends('admin.layouts.app')
@section('title', 'Product Show')

@section('content')
    <div class="container my-10">
        <div class="flex items-center">
            <span class="bg-red-600 text-sm px-2 py-1 rounded-lg text-white mr-3">{{ $product->categories->name }}</span>
            <h2 class="text-5xl font-medium">{{ $product->name }}</h2>
        </div>

        <div class="grid grid-cols-2 gap-10 mt-10">
            <div>
                <p>{{ $product->description }}</p>
                <a href="{{ route('admin.products.file.download', Str::replaceArray('products/', [''], $product->url_sheet)) }}" class="inline-block px-3 py-2 bg-blue-500 rounded shadow text-white hover:bg-blue-400 mr-3">Télécharger la fiche</a>
            </div>

            <div class="text-center">
                <span class="text-6xl font-medium leading-none">{{ $product->price }}</span>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-10 text-center text-white text-xl font-medium">
            <form action="{{ route('admin.products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <button class="w-full bg-green-500 py-2 rounded-md shadow-md hover:bg-green-400">Approuver la fiche</button>
            </form>

            <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="w-full bg-red-600 py-2 rounded-md shadow-md hover:bg-red-400" type="submit">Supprimer la fiche</button>
            </form>
        </div>
    </div>
@endsection