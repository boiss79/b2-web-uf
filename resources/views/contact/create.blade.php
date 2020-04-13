@extends('layouts.app')
@section('title', 'Contact')

@section('content')
    <div class="container my-10">
        <h2 class="text-center text-5xl font-semibold mb-10">Nous contacter</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="mb-5 text-red-500">{{ $error }}</p>
            @endforeach
        @endif

        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-5">
                <label for="last_name" class="font-medium">Nom</label>
                <input type="text" name="last_name" id="last_name" placeholder="Veuillez indiquer votre nom" class="mt-2 p-3 block w-full border shadow rounded" required />
            </div>
            
            <div class="mb-5">
                <label for="first_name" class="font-medium">Prénom</label>
                <input type="text" name="first_name" id="first_name" placeholder="Veuillez indiquer votre prénom" class="mt-2 p-3 block w-full border shadow rounded" required />
            </div>
            
            <div class="mb-5">
                <label for="email" class="font-medium">Email</label>
                <input type="email" name="email" id="email" placeholder="Veuillez indiquer votre email" class="mt-2 p-3 block w-full border shadow rounded" required />
            </div>
            
            <div class="mb-5">
                <label for="object" class="font-medium">Objet</label>
                <input type="text" name="object" id="object" placeholder="Veuillez indiquer l'objet de votre message" class="mt-2 p-3 block w-full border shadow rounded" required />
            </div>
            
            <div class="mb-5">
                <label for="content" class="font-medium">Message</label>
                <textarea type="text" name="content" id="content" placeholder="Veuillez écrire votre message" class="mt-2 p-3 block w-full border shadow rounded" required></textarea>
            </div>

            <button type="submit" class="w-full bg-black rounded shadow text-white text-2xl py-2 hover:bg-gray-900">Envoyer le message</button>
        </form>
    </div>
@endsection