<header class="bg-white py-5 border-b shadow-sm">
    <div class="container">
        <div class="flex justify-between items-center">
            <h1 class="font-medium text-2xl">
                <a href="{{ route('home') }}">Ma Fiche de Révision</a>
            </h1>

            @guest
                <nav>
                    <ul class="flex items-center">
                        <li>
                            <a href="{{ route('fonctionnement') }}" class="{{ (request()->is('fonctionnement')) ? 'font-medium' : '' }}">Fonctionnement</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="{{ (request()->is('products')) ? 'font-medium' : '' }}">Nos fiches</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="{{ (request()->is('login')) ? 'font-medium' : '' }}">Connexion</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="{{ (request()->is('register')) ? 'font-medium' : '' }}">Inscription</a>
                        </li>
                    </ul>
                </nav>
            @endguest

            @auth
                <nav>
                    <ul class="flex items-center">
                        <li>
                            <a href="{{ route('products.create') }}" class="{{ (request()->is('products/create')) ? 'font-medium' : '' }}">Créer une fiche</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="{{ (request()->is('products')) ? 'font-medium' : '' }}">Nos fiches</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center">
                                <img src="{{ asset('images/icons/basket.png') }}" alt="Icone panier" class="w-6 h-6 mr-2" /> 0
                            </a>
                        </li>
                        <li class="relative">
                            <button class="flex items-center focus:outline-none" id="dropdown-button">
                                <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-10 h-10" />
                            </button>
                            <div id="dropdown-menu" class="absolute hidden mt-5 right-0 bg-white rounded-b-md shadow-lg border-t border-white">
                                <a href="{{ route('users.profile.show', Auth::user()) }}" class="block py-3 px-4 hover:bg-gray-200 font-medium">{{ Auth::user()->full_name }}</a>
                                <a href="{{ route('users.profile.show', Auth::user()) }}" class="block py-3 px-4 hover:bg-gray-200">Mes achats</a>
                                <a href="{{ route('users.settings.show') }}" class="block py-3 px-4 hover:bg-gray-200">Paramètres</a>
                                <a href="{{ route('logout') }}" class="block py-3 px-4 hover:bg-gray-200" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
            @endauth
        </div>
    </div>
</header>

@if ($alert = session('green'))
    <x-alert color="green" :message="$alert" />
@endif