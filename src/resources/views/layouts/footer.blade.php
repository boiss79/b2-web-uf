<footer class="bg-white py-10 shadow-md">
    <div class="container text-center">
        <p class="mb-3">&copy; 2020 &bull; Ma Fiche de Révision</p>
        <p class="mb-3">Made with ♥ at Bordeaux</p>
    <a href="{{ route('contact.create')}}">Contact</a>
        @can('access administation')
            <p class="mt-3">
                <a href="{{ route('admin.home') }}">Administration</a>
            </p>
        @endcan
    </div>
</footer>