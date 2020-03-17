<header class="py-5 border-b shadow-sm">
    <div class="container">
        <div class="flex justify-between items-center">
            <h1 class="font-medium text-2xl">
                <a href="{{ route('home') }}">Ma Fiche de Révision</a>
            </h1>

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
        </div>
    </div>
</header>