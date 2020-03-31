@extends('admin.layouts.app')

@section('title', 'Commentaires')

@section('content')

    <h2 class="text-center text-5xl font-semibold my-10">Administration des commentaires</h2>

    <div class="w-4/5 mx-auto">
    <div class="bg-white shadow-md rounded my-6">
      <table class="text-left w-full ">
        <thead>
          <tr>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">#</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Utilisateur</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Fiche</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Contenu</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($comments as $comment)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $comment->id }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $comment->user->first_name }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $comment->product->name }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $comment->created_at }} </td>
                    <td class="py-4 px-6 border-b border-grey-light"> {{ $comment->content }} </td>
                    <td class="py-4 px-6 border-b border-grey-light">
                        <a href="#" class="bg-blue-600 rounded p-1 text-white">Modifier</a>
                        <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST" id="form-delete-comment" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer ce commentaire ? Cette action est irréversible.')" class="">
                          @csrf
                          @method('DELETE')
      
                          <button type="submit" class="p-1 rounded bg-red-600 text-white focus:outline-none">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
            
            @endforelse
        </tbody>
      </table>
    </div>
  </div>

@endsection