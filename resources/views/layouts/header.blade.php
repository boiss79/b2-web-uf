<header class="bg-white py-5 border-b shadow-sm">
    <div class="container">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center">
            <div class="lg:mb-0 flex justify-between items-center lg:flex-none">
                <h1 class="font-medium text-xl lg:text-2xl">
                    <a href="{{ route('home') }}">Ma Fiche de Révision</a>
                </h1>
                <button class="block lg:hidden" id="burger-button">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>

            <nav id="menu" class="hidden lg:block">
                <ul class="flex flex-col lg:flex-row lg:items-center">
                    @guest
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
                    @endguest

                    @auth
                        <li>
                            <a href="{{ route('products.create') }}" class="{{ (request()->is('products/create')) ? 'font-medium' : '' }}">Créer une fiche</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="{{ (request()->is('products')) ? 'font-medium' : '' }}">Nos fiches</a>
                        </li>
                        <li>
                            <a href="{{ route('cart.index') }}" class="flex items-center">
                                <img src="{{ asset('images/icons/basket.png') }}" alt="Icone panier" class="w-6 h-6 mr-2" /> {{ count(\Cart::getContent()) }}
                            </a>
                        </li>
                        <li class="relative">
                            <button class="flex items-center focus:outline-none" id="dropdown-button">
                                <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-6 h-6 lg:w-10 lg:h-10" /> <span class="ml-2 lg:ml-0 lg:hidden">{{ Auth::user()->full_name }}</span>
                            </button>
                            <div id="dropdown-menu" class="absolute hidden mt-5 lg:right-0 bg-white rounded-b-md shadow-lg border-t border-white z-50">
                                <a href="{{ route('users.profile.show', Auth::user()) }}" class="hidden lg:block py-3 px-4 hover:bg-gray-200 font-medium">{{ Auth::user()->full_name }}</a>
                                <a href="{{ route('users.profile.show', Auth::user()) }}" class="block lg:hidden py-3 px-4 hover:bg-gray-200">Mon profil</a>
                                <a href="{{ route('orders.index') }}" class="block py-3 px-4 hover:bg-gray-200">Mes achats</a>
                                <a href="{{ route('users.comments.index') }}" class="block py-3 px-4 hover:bg-gray-200">Mes avis</a>
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
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
</header>

@if ($alert = session('green'))
    <x-alert color="green" :message="$alert" />
@endif

@if ($alert = session('red'))
    <x-alert color="red" :message="$alert" />
@endif