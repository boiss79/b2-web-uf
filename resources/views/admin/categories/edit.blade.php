@extends('admin.layouts.app')
@section('title', 'Edit category')

@section('content')
<div class="container my-10">
    <h2 class="text-5xl font-semibold mb-5">Modification d'une catégorie</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="mb-5 text-red-500">{{ $error }}</p>
        @endforeach
    @endif
    
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="mt-5">
        @csrf
        @method('PUT')

        <label for="name" class="font-medium">Nom de la catégorie</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" placeholder="Nom de votre catégorie" class="bg-white mt-2 p-3 block w-full border shadow rounded" required />

        <button type="submit" class="mt-5 w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900">Valider les changements</button>
    </form>
</div>
@endsection