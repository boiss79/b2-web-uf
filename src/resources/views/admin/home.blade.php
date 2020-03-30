@extends('admin.layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="container my-20">
        <h2 class="text-center text-5xl font-semibold my-10">Administration</h2>
        <div class="grid grid-cols-4 gap-10">
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-blue-600 px-3 py-2 text-white rounded-lg mb-5">Utilisateurs</p>
                <h3 class="text-2xl font-medium mb-5">{{ $users->count() }}</h3>
            </div>
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-orange-600 px-3 py-2 text-white rounded-lg mb-5">Fiches</p>
                <h3 class="text-2xl font-medium mb-5">{{ $products->count() }}</h3>
            </div>
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-green-600 px-3 py-2 text-white rounded-lg mb-5">Commentaires</p>
                <h3 class="text-2xl font-medium mb-5">{{ $comments->count() }}</h3>
            </div>
            <div class="bg-white rounded-lg shadow-lg border p-10 flex flex-col items-center">
                <p class="bg-yellow-600 px-3 py-2 text-white rounded-lg mb-5">Catégories</p>
                <h3 class="text-2xl font-medium mb-5">{{ $categories->count() }}</h3>
            </div>
        </div>
    </div>


@endsection
