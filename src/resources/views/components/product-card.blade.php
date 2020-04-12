<a href="{{ route('products.show', $product) }}">
    <div class="bg-white rounded-lg border shadow-lg p-5 flex flex-col items-center">
        <p class="bg-blue-600 px-2 py-1 text-white rounded-lg mb-5">{{ $product->categories->name }}</p>
        <h3 class="text-2xl font-medium mb-5 h-24 text-center">{{ $product->name }}</h3>
        <p class="text-yellow-500 text-3xl mb-5">@include('includes.average', ['rating' => round($product->comments->avg('rating'))])</p>
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar par défaut" class="w-10 h-10 mr-3" />
            <p class="ml-3">par <strong>{{ $product->owner->full_name }}</strong></p>
        </div>
    </div>
</a>