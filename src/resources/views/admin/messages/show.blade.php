@extends('admin.layouts.app')
@section('title', 'Product Show')

@section('content')
    <div class="container my-10">
        <h2 class="mb-4 text-5xl font-medium">{{ $message->object }}</h2>
        <p class="ml-2 text-gray-600">Envoyé par {{ $message->first_name }} {{ $message->last_name }}</p>
        <p class="ml-2 text-gray-600">Le {{ date('d M Y', strtotime($message->created_at)) }}</p>
        <p class="ml-2 my-4"> <span class="font-bold">Objet du message :</span>{{$message->object}}</p>
        <p class="ml-2"><span class="font-bold">Message :</span></p>
        <p class="ml-2 my-4">{{$message->content}}</p>
    </div>
@endsection