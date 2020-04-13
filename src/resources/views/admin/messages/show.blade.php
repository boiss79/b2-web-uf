@extends('admin.layouts.app')
@section('title', 'Product Show')

@section('content')
    <div class="container my-10">
        <h2 class="mb-4 text-5xl font-medium">{{ $message->object }}</h2>
        <p class="ml-2 text-white p-2 my-2 inline-block rounded-md shadow-md bg-blue-500">Envoyé par {{ $message->first_name }} {{ $message->last_name }}</p>
        <br>
        <p class="ml-2 text-white p-2 my-2 inline-block rounded-md shadow-md bg-blue-500">Reçu le {{ date('d M Y', strtotime($message->created_at)) }}</p>
        <p class="ml-2 my-4"> <span class="font-bold text-xl">Objet du message : </span>{{$message->object}}</p>
        <p class="ml-2"><span class="font-bold text-xl">Message :</span></p>
        <p class="ml-2 my-4">{{$message->content}}</p>
    </div>
@endsection