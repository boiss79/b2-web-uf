<footer class="bg-white py-10 shadow-md">
    <div class="container text-center">
        <p class="mb-3">&copy; 2020 &bull; Ma Fiche de Révision</p>
        <p>Made with ♥ at Bordeaux</p>
        @can('access administation')
            <p class="mt-3">
                <a href="{{ route('test') }}">Administration</a>
            </p>
        @endcan
    </div>
</footer>