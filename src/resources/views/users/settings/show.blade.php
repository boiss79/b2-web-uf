@section('title', 'Paramètres')
@extends('layouts.app')

@section('content')
    <div class="container my-10">
        <h2 class="text-5xl font-semibold">Paramètres</h2>
        <p>Gérer tous les paramètres de votre compte. Changement de mot de passe, changement d'adresse email, suppression du compte...</p>

        <div class="grid lg:grid-cols-2 gap-10 mt-10">
            <div>
                <h3 class="text-3xl">Gestion du mot de passe</h3>
                <p>Il est recommandé de changer fréquemment votre mot de passe et de choisir un code robuste. Nous vous recommandons d'utiliser un mot de passe différent sur chaque site.</p>
                <form action="{{ route('users.settings.updatePassword') }}" method="POST" class="mt-5 shadow-md border rounded-lg p-5 bg-white" id="form-change-password">
                    @csrf
                    @method('POST')

                    @if ($errors->updatePassword->any())
                        @foreach ($errors->updatePassword->all() as $error)
                            <p class="text-red-500 mb-5">{{ $error }}</p>
                        @endforeach
                    @endif

                    <div class="mb-5">
                        <label for="current_password" class="font-medium">Mot de passe actuel</label>
                        <input type="password" name="current_password" id="current_password" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre mot de passe actuel" required />
                    </div>

                    <div class="mb-5">
                        <label for="new_password" class="font-medium">Nouveau mot de passe &bull;</label>
                        <small>Minimum 8 caractères</small>
                        <input type="password" name="new_password" id="new_password" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre nouveau mot de passe" required />
                    </div>

                    <div class="mb-5">
                        <label for="new_password_confirmation" class="font-medium">Confirmation du nouveau mot de passe</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Retapez votre nouveau mot de passe" required />
                    </div>

                    <button type="submit" form="form-change-password" class="w-full bg-blue-500 rounded shadow text-white text-lg py-2 hover:bg-blue-600">
                        Modifier le mot de passe
                    </button>
                </form>

                <h3 class="text-3xl mt-5">Suppression du compte</h3>
                <p>Si vous souhaitez supprimer votre compte, vous pouvez cliquer sur le bouton ci-dessous. Toutes les données associées à votre compte seront effacées. Cette action est irréversible.</p>
                <form action="{{ route('users.settings.destroy', $user) }}" method="POST" id="form-delete-user" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.')" class="mt-5">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="bg-red-500 p-2 hover:bg-red-600 font-medium rounded shadow text-white focus:outline-none">Supprimer mon compte</button>
                </form>
            </div>
 
            <div>
                <h3 class="text-3xl">Gestion de l'adresse email</h3>
                <p>Si vous désirez changer l'adresse email associé à votre compte, modifiez là ci-dessous.</p>
                <form action="{{ route('users.settings.updateEmail', $user) }}" method="POST" class="mt-5 shadow-md border rounded-lg p-5 bg-white" id="form-change-email">
                    @csrf
                    @method('PUT')

                    @if ($errors->updateEmail->any())
                        @foreach ($errors->updateEmail->all() as $error)
                            <p class="text-red-500 mb-5">{{ $error }}</p>
                        @endforeach
                    @endif
                    
                    <label for="email" class="font-medium">Adresse email</label>
                    <input type="email" name="email" id="email" class="mt-2 p-3 block w-full border shadow rounded" placeholder="Votre adresse email" value="{{ $user->email }}" required />
                    <button type="submit" form="form-change-email" class="mt-5 w-full bg-blue-500 rounded shadow text-white text-lg py-2 hover:bg-blue-600">
                        Modifier l'adresse email
                    </button>
                </form>
                
                <h3 class="text-3xl mt-5">Gestion de la newsletter</h3>
                <p>Si vous souhaitez être abonné à notre newsletter et recevoir tous nos emails ainsi que les offres de nos partenaires, cochez les cases suivantes.</p>
                <form action="" method="POST" class="mt-5 shadow-md border rounded-lg p-5 bg-white">
                    <p class="font-medium mb-5">J'accepte de recevoir les emails et les offres provenants de :</p>
                    <div class="mb-2">
                        <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Ma Fiche de Révision et son équipe</label>
                    </div>

                    <div class="">
                        <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Nos partenaires</label>
                    </div>

                    <button type="submit" class="mt-5 w-full bg-blue-500 rounded shadow text-white text-lg py-2 hover:bg-blue-600">
                        Modifier l'adresse email
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
