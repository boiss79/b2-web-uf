@extends('admin.layouts.app')
@section('title', 'Paiements')

@section('content')
<div class="container my-10">
    <h2 class="text-5xl font-semibold mb-5">Commandes</h2>
    <p>Gestion des paiements. Vous pouvez voir la liste de tous les paiements réalisés ansi que leur statut.</p>
    
    <table class="bg-white w-full rounded-lg shadow-lg text-sm mt-10">
        <thead class="bg-gray-300">
            <tr class="border-b-2">
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tl-lg">#</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Référence</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Acheteur</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Statut</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium">Date</th>
                <th class="uppercase text-left px-5 py-3 text-gray-600 font-medium rounded-tr-lg">Voir</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
                <tr class="border-b">
                    <td class="px-5 py-5">{{ $loop->iteration }}</td>
                    <td class="px-5 py-5">{{ $order->reference }}</td>
                    <td class="px-5 py-5">
                        <div class="flex items-center">
                            <img src="{{ asset('images/avatar.svg') }}" alt="Image avatar" class="w-5 h-5 mr-2" />
                            {{ $order->user->fullName }}
                        </div>
                    </td>
                    <td class="px-5 py-5">
                        @if (Mollie::api()->payments()->get($order->payment_token)->status === 'paid')
                            <div class="inline-flex items-center px-2 py-1 bg-green-200 text-green-500 font-medium rounded-full">
                                <img src="{{ asset('images/icons/check-green.svg') }}" alt="Icone sablier" class="w-4 h-4 mr-2" />
                                <span>Payé</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-5 py-5">{{ \Carbon\Carbon::parse($order->created_at)->format('j F Y') }}</td>
                    <td class="px-5 py-5">
                        <a href="#">
                            <img src="{{ asset('images/icons/eye.svg') }}" alt="Icone oeil" class="w-5 h-5" />
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection