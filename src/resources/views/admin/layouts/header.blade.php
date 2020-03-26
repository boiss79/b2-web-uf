<header class="bg-white py-5 border-b shadow-sm">
    <div class="container">
        <div class="flex justify-between items-center">
            <h1 class="font-medium text-2xl">
                <a href="{{ route('home') }}">Administration</a>
            </h1>    
            <nav>
                <ul class="flex items-center">
                    <li>
                        <a href="{{ route('fonctionnement') }}" class="{{ (request()->is('fonctionnement')) ? 'font-medium' : '' }}">Utilisateurs</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="{{ (request()->is('products')) ? 'font-medium' : '' }}">Produits</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="{{ (request()->is('login')) ? 'font-medium' : '' }}">Commentaires</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>