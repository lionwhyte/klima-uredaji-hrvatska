@extends('layout')

@section('content')
<ul class="breadcrumb flex justify-center sm:text-2xl text-gray-500 font-semibold text-center space-x-4 my-4">
    <li>
        <a href="/kosarica" class="transition duration-150 hover:text-indigo-700">Pregled košarice</a>
    </li>
    <li class="self-center">
        <i class="fa-solid fa-angle-right"></i>
    </li>
    <li>
        <a href="/checkout" class="transition duration-150 hover:text-indigo-700">Podaci za račun i dostavu</a>
    </li>
    <li class="self-center">
        <i class="fa-solid fa-angle-right"></i>
    </li>
    <li>
        <span class="text-indigo-700">Potvrda narudžbe</span>
    </li>
</ul>

<div class="container mx-auto mt-8 mb-16 px-6 max-w-4xl space-y-8">
    <div class="text-center">
        <h1 class="inline-block border-2 border-green-500 bg-green-50 py-8 px-8 lg:px-24 text-center text-xl font-bold text-slate-800 rounded-lg shadow-sm">
            Hvala! Vaša narudžba je uspješno zaprimljena.
        </h1>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 bg-white p-6 rounded-lg border border-gray-200 shadow-sm text-center">
        <div>
            <h3 class="text-xs text-gray-500 uppercase font-semibold">Broj narudžbe</h3>
            <p class="font-bold text-slate-800 text-lg mt-1">{{ $order->order_id }}</p>
        </div>
        <div>
            <h3 class="text-xs text-gray-500 uppercase font-semibold">Status</h3>
            <p class="font-bold text-indigo-600 text-lg mt-1">NA ČEKANJU</p>
        </div>
        <div>
            <h3 class="text-xs text-gray-500 uppercase font-semibold">Datum</h3>
            <p class="font-bold text-slate-800 text-lg mt-1">
                @php
                    $dateTime = new DateTime($order->created_at);
                    echo $dateTime->format('j. n. Y.');
                @endphp
            </p>
        </div>
        <div>
            <h3 class="text-xs text-gray-500 uppercase font-semibold">Ukupno</h3>
            <p class="font-bold text-slate-800 text-lg mt-1">{{ $order->total_amount }} €</p>
        </div>
    </div>

    <div class="bg-sky-50 border border-sky-100 p-6 rounded-lg text-center space-y-2">
        <h3 class="font-bold text-slate-800">Informacije o odabranom načinu plaćanja</h3>
        <p class="text-sm text-gray-600">
            @if ($order->payment_method_id === 1)
                Odabrali ste plaćanje po ponudi. Na vašu e-mail adresu uskoro stižu podatci za uplatu.
            @elseif($order->payment_method_id === 2)
                Odabrali ste plaćanje karticom na rate. Naš tim će vas kontaktirati radi potvrde obročnog plaćanja.
            @elseif($order->payment_method_id === 3)
                Odabrali ste gotovinsko plaćanje prilikom preuzimanja ili montaže uređaja.
            @endif
        </p>
    </div>

    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm space-y-3">
        <h2 class="text-xl font-bold text-slate-800">Podaci za uplatu (Virman / Opća uplatnica)</h2>
        <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
            <li>Banka: <strong class="text-slate-800">Addiko Bank d.d.</strong></li>
            <li>IBAN: <strong class="text-slate-800">HR1234567890123456789</strong></li>
            <li>Model i poziv na broj: <strong class="text-slate-800">HR01 - {{ $order->order_id }}</strong></li>
        </ul>
    </div>

    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
        <h4 class="text-lg font-bold text-slate-800 mb-4">Pregled naručenih artikala</h4>
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-gray-500">
                    <th class="text-start py-2">Proizvod</th>
                    <th class="text-end py-2">Ukupno</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($order->items as $item)
                <tr>
                    <td class="py-3">
                        <a href="/klima-uredaji/{{ $item->product->slug }}" class="text-indigo-600 font-medium hover:underline">{{ $item->product->naslov }}</a> 
                        <span class="text-gray-500">× {{$item->quantity}}</span>
                    </td>
                    <td class="text-end font-semibold text-slate-800 py-3">
                        {{$item->subtotal}} €
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-t">
                    <th class="text-start py-3 font-medium text-gray-600">Dostava:</th>
                    <td class="text-end py-3 font-semibold text-green-600">Besplatna dostava</td>
                </tr>
                <tr class="border-t font-bold text-base">
                    <th class="text-start py-4 text-slate-800">Ukupno za platiti:</th>
                    <td class="text-end py-4 text-slate-800">{{ $order->total_amount }} €</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection