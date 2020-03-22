@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container my-20">
        <h2 class="text-center text-5xl font-semibold mb-10">Créer une fiche</h2>

        <div class="grid grid-cols-2 gap-10">
            <form action="{{ route('products.home') }}" method="POST">
                @csrf
                @method('POST')
    
                <div class="mb-5">
                    <label for="name" class="font-medium">Nom</label>
                    <input type="text" name="name" id="name" placeholder="Nom de la fiche" class="mt-2 p-3 block w-full border shadow rounded" required />
                </div>

                <div class="mb-5">
                    <label for="category" class="font-medium">Catégorie</label>
                    <select name="category" id="category" class="bg-white mt-2 p-3 block w-full border shadow rounded @error('category') border-red-500 @enderror">
                        <option value="">Veuillez choisir une catégorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="description" class="font-medium">Description</label>
                    <textarea name="description" id="description" rows="6" placeholder="Qu'allons-nous apprendre dans votre fiche ?" class="mt-2 p-3 block w-full border shadow rounded" required></textarea>
                </div>

                <div class="mb-5">
                    <label for="sheet" class="font-medium">Fiche (.pdf uniquement)</label>
                    <input type="file" name="sheet" id="sheet" placeholder="Votre fiche" class="bg-white mt-2 p-3 block w-full border shadow rounded" required />
                </div>

                <div class="mb-5">
                    <label for="price" class="font-medium">Prix (&euro;)</label>
                    <input type="number" name="price" id="price" placeholder="Prix de la fiche" step="0.01" class="mt-2 p-3 block w-full border shadow rounded" required />
                </div>

                <button type="submit" class="w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900">Publier ma fiche</button>
            </form>

            <img src="https://placehold.it/400x400" alt="" />
        </div>
    </div>
@endsection
