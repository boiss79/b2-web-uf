@extends('layouts.app')

@section('content')
    <div class="bg-login">
        <div class="container pt-10 lg:pt-20">
            <div class="bg-white p-10 rounded shadow-md max-w-lg">
                <h2 class="font-semibold text-2xl lg:text-4xl text-center mb-5">Connexion</h2>
                
                <form method="POST" action="{{ route('login') }}" class="text-sm lg:text-base">
                    @csrf
                    @method('POST')

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 mb-5">{{ $error }}</p>
                        @endforeach
                    @endif
                    
                    <div class="mb-5">
                        <label for="email" class="font-medium">Email</label>
                        <input type="email" name="email" id="email" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Adesse email" required />
                    </div>

                    <div class="mb-5">
                        <label for="password" class="font-medium">Mot de passe</label>
                        <input type="password" name="password" id="password" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Mot de passe" required />
                    </div>

                    <div class="mb-5">
                        <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Se souvenir de moi</label>
                    </div>

                    <button type="submit" class="mb-5 w-full bg-black rounded shadow text-white text-lg lg:text-2xl py-2 hover:bg-gray-900">
                        Se connecter
                    </button>
        
                    @if (Route::has('password.request'))
                        <p class="font-medium text-center">
                            <a href="{{ route('password.request') }}">
                                Mot de passe oublié ? Cliquez ici
                            </a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
