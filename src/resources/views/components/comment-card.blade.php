<div class="my-10 bg-white rounded-lg border shadow-lg p-5">
    <div class="mb-5">
        <h3 class="font-medium text-3xl">{{ $comment->product->name }}</h3>
        <p class="text-gray-600 font-medium">{{ \Carbon\Carbon::parse($comment->created_at)->format('j F Y') }}</p>
    </div>

    <p class="mb-5"">{{ $comment->content }}</p>

    <p class="pb-5 border-b-2 font-medium text-2xl">
        Note : <span class="ml-2 text-yellow-500 ">@include('includes.average', ['rating' => $comment->rating])</span>
    </p>

    <div class="mt-6 flex">
        <a href="{{ route('products.comments.edit', $comment->product_id) }}" class="bg-blue-500 rounded shadow text-white py-2 px-3 hover:bg-blue-400">Modifier le commentaire</a>

        <form action="{{ route('products.comments.destroy', $comment) }}" method="POST" class="ml-5">
            @csrf
            @method('DELETE')

            <button type="submit" class="bg-red-500 rounded shadow text-white py-2 px-3 hover:bg-red-400">Supprimer le commentaire</button>
        </form>
    </div>
</div>