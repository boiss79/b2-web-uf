@extends('admin.layouts.app')
@section('title', 'Messages')

@section('content')
<div class="container my-10">
    <h2 class="text-5xl font-semibold mb-5">Messages</h2>
    <p>Gestion des messages. Vous pouvez lire et supprimer un message</p>
    
    <table class="bg-white w-full rounded-lg shadow-lg text-sm mt-10">
        <thead class="bg-gray-300">
            <tr class="border-b-2">
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Date</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Nom</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Prénom</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Email</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Objet</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Message</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($messages as $message)
                <tr class="border-b">
                    <td class="px-5 py-5">{{ date('d M Y', strtotime($message->created_at)) }}</td>
                    <td class="px-5 py-5">{{ $message->last_name }}</td>
                    <td class="px-5 py-5">{{ $message->first_name }}</td>
                    <td class="px-5 py-5">{{ $message->email }}</td>
                    <td class="px-5 py-5">{{ $message->object }}</td>
                    <td class="px-5 py-5">{{ Str::limit($message->content, 60) }}</td>
                    <td class="px-5 py-5">
                        <div class="flex items-center">
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 mr-2">Supprimer</button>
                            </form>
                            <form class="px-4 py-4">
                            <a href="{{ route("admin.messages.show", $message->id)}}">
                                    <img src="{{ asset('images/icons/eye.svg') }}" alt="Icone oeil" style="width:40px;height:40px;" />
                                </a>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection