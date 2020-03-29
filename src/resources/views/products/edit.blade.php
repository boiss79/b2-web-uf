@extends('layouts.app')
@section('title', 'Edit')

@section('content')
    <div class="container my-10">
        <h2 class="text-center text-5xl font-semibold mb-10">Modifier une fiche</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="mb-5 text-red-500">{{ $error }}</p>
            @endforeach
        @endif

        <div class="grid grid-cols-2 gap-10">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-5">
                    <label for="name" class="font-medium">Nom</label>
                    <input type="text" name="name" id="name" placeholder="Nom de la fiche" value="{{ $product->name }}" class="mt-2 p-3 block w-full border shadow rounded" required />
                </div>

                <div class="mb-5">
                    <label for="category" class="font-medium">Catégorie</label>
                    <select name="category_id" id="category" class="bg-white mt-2 p-3 block w-full border shadow rounded @error('category') border-red-500 @enderror">
                        <option value="">Veuillez choisir une catégorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id === $product->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="description" class="font-medium">Description</label>
                    <textarea name="description" id="description" rows="6" placeholder="Qu'allons-nous apprendre dans votre fiche ?" class="mt-2 p-3 block w-full border shadow rounded" required>{{ $product->description }}</textarea>
                </div>

                <div class="mb-5">
                    <label for="file" class="font-medium">Fiche (.pdf uniquement)</label>
                    <input type="file" name="url_sheet" id="file" placeholder="Votre fiche" class="bg-white mt-2 p-3 block w-full border shadow rounded" />
                </div>

                <div class="mb-5">
                    <label for="price" class="font-medium">Prix (&euro;)</label>
                    <input type="number" name="price" id="price" placeholder="Prix de la fiche" step="0.01" value="{{ $product->price }}" class="mt-2 p-3 block w-full border shadow rounded" required />
                </div>

                <button type="submit" class="w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900">Publier ma fiche</button>
            </form>

            <img src="https://placehold.it/400x400" alt="" />
        </div>
    </div>
@endsection
