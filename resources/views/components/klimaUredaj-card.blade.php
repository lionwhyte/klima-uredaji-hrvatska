@props(['klimaUredaj'])

@php
$slike = explode(',', $klimaUredaj->slike);

if (isset($klimaUredaj->onSale->time_till_sale)) {
    $targetDateTime = \Carbon\Carbon::parse($klimaUredaj->onSale->time_till_sale);
    $now = \Carbon\Carbon::now();
    $timeDifference = $targetDateTime->diff($now);
    $timeLeft = $timeDifference->format('%ad %hh %im %ss');
}
@endphp

<x-card class="{{ $klimaUredaj->onSale ? 'discounted-product' : '' }}">
    <div class="grid md:grid-cols-3 md:space-x-6">
        <a href="/klima-uredaji/{{$klimaUredaj->slug}}" class="relative h-fit block">
            <img class="w-full object-cover rounded" 
                src="{{ asset('images/' . $klimaUredaj->brend . '/' . (isset($slike[2]) && !empty($slike[2]) ? $slike[2] : $slike[0])) }}" alt="{{ $klimaUredaj->naslov }}" />
            @if($klimaUredaj->onSale)
                <div class="absolute left-0 bottom-0 onSaleCountdown font-semibold text-white text-xs bg-indigo-700/80 inline-block px-2 py-1 w-full text-center rounded-b" data-time="{{$klimaUredaj->onSale->time_till_sale}}">
                    {{$timeLeft}}
                </div>
                <span class="absolute top-2 left-2 z-10 text-white font-semibold bg-red-500 px-2 py-1 rounded text-xs">-{{ $klimaUredaj->onSale->discount }}%</span>
            @endif
        </a>
       
        <div class="md:col-span-2 space-y-3">
            <h3 class="text-xl font-bold text-slate-800">
                <a href="/klima-uredaji/{{$klimaUredaj->slug}}" class="hover:text-indigo-600 transition duration-150">{{$klimaUredaj->naslov}}</a>
            </h3>

            <ul id="specifikacije" class="text-sm text-gray-600 space-y-1">
                <li>
                    <span class="font-medium">Učinak hlađenja:</span>
                    <span>{{$klimaUredaj->ucinak_hladenja_kw}} kW</span>
                </li>
                <li>
                    <span class="font-medium">Učinak grijanja:</span>
                    <span>{{$klimaUredaj->ucinak_grijanja_kw}} kW</span>
                </li>
                <li>
                    <span class="font-medium">Energetski razred:</span>
                    <span>{{$klimaUredaj->energetski_razred_hladenja}}</span>
                </li>
                <li>
                    <span class="font-medium">Veličina prostora:</span>
                    <span>{{$klimaUredaj->velicina_prostora_m2}} m²</span>
                </li>
            </ul>

            {{-- Cijene (Redovne ili akcijske) --}}
            <div class="pt-2">
                @if($klimaUredaj->onSale)
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-400 line-through text-lg font-semibold">{{$klimaUredaj->cijena}} €</span>
                        <span class="text-2xl font-bold text-red-600">
                            {{round($klimaUredaj->cijena - ($klimaUredaj->cijena * ($klimaUredaj->onSale->discount / 100)), 2)}} €
                        </span>
                    </div>
                @else
                    <div class="text-2xl font-bold text-slate-800">
                        <span>{{$klimaUredaj->cijena}}</span><span> €</span>
                    </div>
                @endif
            </div>

            {{-- Glavni Livewire gumb za dodavanje u košaricu --}}
            <div class="pt-2">
                <livewire:add-to-cart :productId="$klimaUredaj->id" />
            </div>
        </div>
    </div>
</x-card>