<footer class="bg-black py-10 shadow-md text-white text-xs lg:text-sm">
    <div class="container">
        <div class="flex flex-col md:flex-row justify-between">
            <div>
                <p class="mb-3">&copy; 2020 &bull; Ma Fiche de Révision &bull; <a href="{{ route('contact.create')}}" class="underline">Contactez-nous</a></p>
                <p class="mb-3">Conçu avec ❤️à Bordeaux</p>
                @can('access administation')
                    <p class="mt-3">
                        <a href="{{ route('admin.home') }}">Administration</a>
                    </p>
                @endcan
            </div>

            <ul class="flex items-center">
                <li class="mr-5">
                    <a href="#">
                        <img src="{{ asset('images/icons/social/facebook.svg') }}" alt="Logo Facebook" class="w-10 h-10 bg-white rounded-md" />
                    </a>
                </li>
                <li class="mr-5">
                    <a href="#">
                        <img src="{{ asset('images/icons/social/twitter.svg') }}" alt="Logo Twitter" class="w-10 h-10" />
                    </a>
                </li>
                <li class="mr-5">
                    <a href="#">
                        <img src="{{ asset('images/icons/social/instagram.svg') }}" alt="Logo Instagram" class="w-10 h-10" />
                    </a>
                </li>
                <li>
                    <a href="#" >
                        <img src="{{ asset('images/icons/social/linkedin.svg') }}" alt="Logo LinkedIn" class="w-10 h-10 bg-white rounded-md" />
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>