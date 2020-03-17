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
                            <a href="#">Fonctionnement</a>
                        </li>
                        <li>
                            <a href="#">Nos fiches</a>
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
                            <a href="#">Fonctionnement</a>
                        </li>
                        <li>
                            <a href="#">Nos fiches</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                            </form>
                        </li>
                    </ul>
                </nav>
            @endauth
        </div>
    </div>
</header>