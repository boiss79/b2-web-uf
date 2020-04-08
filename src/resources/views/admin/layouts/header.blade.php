<header class="bg-gray-900 text-white py-5 border-b shadow-sm">
    <div class="container">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="font-medium text-2xl mr-5">
                    <a href="{{ route('admin.home') }}">Administration</a>
                </h1>
                <a href="{{ route('home') }}" class="text-xs bg-white text-black rounded-md shadow-md px-2 py-1 hover:bg-gray-100">&larr; Retour sur le site</a>
            </div>
            <nav>
                <ul class="flex items-center">
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="{{ (request()->is('admin/products')) ? 'font-medium' : '' }}">Produits</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index')}}" class="{{ (request()->is('admin/categories')) ? 'font-medium' : '' }}">Catégories</a>
                    </li>
                    @can('edit users')
                        <li>
                            <a href="{{ route('admin.users.index')}}" class="{{ (request()->is('admin/users')) ? 'font-medium' : '' }}">Utilisateurs</a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('admin.messages.index')}}" class="{{ (request()->is('admin/messages')) ? 'font-medium' : '' }}">Messages</a>
                    </li>
                    <li class="relative">
                        <button class="flex items-center focus:outline-none" id="dropdown-button">
                            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-10 h-10" />
                        </button>
                        <div id="dropdown-menu" class="absolute hidden mt-5 right-0 bg-gray-900 rounded-b-md shadow-lg border-t border-gray-900">
                            <a href="{{ route('users.profile.show', Auth::user()) }}" class="block py-3 px-4 hover:bg-gray-800 font-medium">{{ Auth::user()->full_name }}</a>
                            <a href="{{ route('logout') }}" class="block py-3 px-4 rounded-b-md hover:bg-gray-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
        </div>
    </div>
</header>

@if ($alert = session('green'))
    <x-alert color="green" :message="$alert" />
@endif