<div class="my-10 bg-white rounded-lg border shadow-lg p-5">
    <div class="grid grid-cols-3 items-center pb-2 border-b-2">
        <div>
            <h2 class="font-medium text-3xl">Commande #{{ $index }}</h2>
            <p class="text-gray-600 text-sm"><span class="font-medium">Référence :</span> {{ $order->reference }}</p>
        </div>
        <p class="text-center text-xl">{{ \Carbon\Carbon::parse($order->created_at)->format('j F Y') }}</p>

        <span class="font-medium text-5xl text-right">{{ $order->total_price }} &euro;</span>
    </div>

    @foreach ($order->productPurchased as $product)
        <div class="my-5 grid grid-cols-3 gap-8 items-center text-xl">
            <h3 class="">{{ $product->name }}</h3>
            <div class="text-base">
                <a href="{{ route('products.file.download', Str::replaceArray('products/', [''], $product->url_sheet)) }}" class="inline-block px-3 py-2 bg-blue-500 rounded shadow text-white hover:bg-blue-400 mr-3">Télécharger la fiche</a>
                @if ($product->product_id)
                    <a href="{{ route('products.show', $product->product_id) }}" class="inline-block px-3 py-2 bg-gray-600 rounded shadow text-white hover:bg-gray-500">Voir le produit</a>
                @endif
                <a href="{{ route('products.comments.create', $product->product_id) }}" class="inline-block mt-3 px-3 py-2 bg-yellow-500 rounded shadow text-white hover:bg-yellow-400">Laisser un avis</a>
            </div>
            <span class="text-right">{{ $product->price }} &euro;</span>
        </div>
    @endforeach
</div>
