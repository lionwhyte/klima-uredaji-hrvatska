@extends('layout')
@section('content')

@php
    $breadcrumbs = [
            ['title' => 'NASLOVNICA', 'url' => '/'],
            ['title' => 'KLIMA UREĐAJI', 'url' => '/klima-uredaji'],
            ['title' => strtoupper($klimaUredaj->slug), 'url' => '']
        ];

    $slike = explode(',', $klimaUredaj->slike);
@endphp

<div class="mx-4 mx-auto px-4 mt-4">
    <x-card>
        <div class="flex flex-col">
            <div class="grid md:grid-cols-3 md:space-x-8">
                <div class="md:col-span-1 overflow-hidden relative">
                    <x-klimaUredajCarousel :klimaUredaj="$klimaUredaj" /> 
                </div>
                <div class="md:col-span-2">
                    <h3 class="text-3xl font-bold text-slate-800">{{$klimaUredaj->naslov}}</h3>

                    <div class="text-lg text-sm mt-4 mb-2 text-gray-600">
                        <span class="font-bold">SKU: </span><span>{{$klimaUredaj->slug}}</span>
                    </div>
                    <div class="text-lg text-sm text-gray-600">
                        <span class="font-bold">Kategorija: </span>
                        <span><a href="/klima-uredaji" class="hover:text-slate-700">Klima uređaji</a></span>
                    </div>

                    {{-- CIJENA --}}
                    @if($klimaUredaj->onSale && $klimaUredaj->BestBuy)
                        <p class="mt-4 font-bold text-indigo-700">NAJEFTINIJE U PONUDI</p>
                        <p class="text-2xl font-bold mt-2 line-through text-gray-400"><span>{{$klimaUredaj->cijena}}</span><span>€</span></p>
                        <p class="text-3xl font-bold text-red-600">
                            <span>{{round($klimaUredaj->cijena - ($klimaUredaj->cijena * ($klimaUredaj->onSale->discount / 100)), 2)}}</span><span>€</span>
                        </p>
                    @elseif($klimaUredaj->onSale)
                        <p class="text-2xl font-bold mt-4 line-through text-gray-400"><span>{{$klimaUredaj->cijena}}</span><span>€</span></p>
                        <p class="text-3xl font-bold text-red-600">
                            <span>{{round($klimaUredaj->cijena - ($klimaUredaj->cijena * ($klimaUredaj->onSale->discount / 100)), 2)}}</span><span>€</span>
                        </p>
                    @elseif($klimaUredaj->BestBuy)
                        <p class="mt-4 font-bold text-indigo-700">NAJEFTINIJE U PONUDI</p>
                        <div class="text-3xl font-bold mt-2 text-slate-800"><span>{{$klimaUredaj->cijena}}</span><span>€</span></div>
                    @else
                        <div class="text-3xl font-bold mt-4 text-slate-800"><span>{{$klimaUredaj->cijena}}</span><span>€</span></div>
                    @endif
                   
                    <hr class="my-6">
                    
                    {{-- Košarica --}}
                    <div class="my-4">
                        <livewire:add-to-cart :productId="$klimaUredaj->id" />
                    </div>

                    <hr class="my-6">
                    
                    {{-- Generički društveni linkovi / kontakt --}}
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-gray-500">Podijeli ili pitaj:</span>
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook text-blue-500 hover:text-blue-600 text-2xl"></i></a>
                        <a href="mailto:info@klimatizacija-webshop.test"><i class="fa-solid fa-envelope text-red-500 hover:text-red-600 text-2xl"></i></a>
                    </div>

                    <ul class="grid sm:grid-cols-4 mt-8 max-w-xl mx-auto space-y-8 sm:space-y-0">
                        <li class="mx-auto text-center">
                            <img class="mx-auto h-12" src="{{ asset('images/ucinak-hladenja_5a2a794525dfd.png')}}" alt="ucinak-hladenja">
                            <p class="font-semibold text-gray-700">{{$klimaUredaj->ucinak_hladenja_kw}} kW</p>
                            <p class="mt-1 text-xs text-gray-500">Učinak hlađenja</p>
                        </li>
                        <li class="mx-auto text-center">
                            <img class="mx-auto h-12" src="{{ asset('images/ucin_grijanja.png')}}" alt="ucin_grijanja">
                            <p class="font-semibold text-gray-700">{{$klimaUredaj->ucinak_grijanja_kw}} kW</p>
                            <p class="mt-1 text-xs text-gray-500">Učinak grijanja</p>
                        </li>
                        <li class="mx-auto text-center">
                            <img class="mx-auto h-12" src="{{ asset('images/energetski_razred.png')}}" alt="energetski_razred">
                            <p class="font-semibold text-gray-700">{{$klimaUredaj->energetski_razred_hladenja}}</p>
                            <p class="mt-1 text-xs text-gray-500">Energetski razred</p>
                        </li>
                        <li class="mx-auto text-center">
                            <img class="mx-auto h-12" src="{{ asset('images/velicina_prostora.png')}}" alt="velicina_prostora">
                            <p class="font-semibold text-gray-700">{{$klimaUredaj->velicina_prostora_m2}} m²</p>
                            <p class="mt-1 text-xs text-gray-500">Veličina prostora</p>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border border-gray-200 w-full mb-4 mt-8"></div>
            
            <div id="opis-proizvoda">
                <!-- Tabs -->
                <div class="flex space-x-2">
                    <button onclick="showTab('opisContent')" class="font-semibold py-2 px-4 bg-gray-200 hover:bg-gray-300 border-b-4 border-sky-500 text-slate-700 rounded-t" id="opisContentButton">
                        OPIS
                    </button>
                    <button onclick="showTab('informacijeContent')" class="font-semibold py-2 px-4 bg-gray-200 hover:bg-gray-300 text-slate-700 rounded-t" id="informacijeContentButton">
                        DODATNE INFORMACIJE
                    </button>
                </div>
                <hr class="mb-6 border-gray-200">
            
                <!-- Tab Content -->
                <div id="opisContent" class="tab-content text-gray-700 leading-relaxed">
                    <p>{!! $klimaUredaj->opis !!}</p>
                </div>
            
                <div id="informacijeContent" class="hidden tab-content">
                    <x-klimaUredajSpecifikacije-tablica :klimaUredaj="$klimaUredaj" />
                </div>
            </div>
        </div>
    </x-card>

    <div class="my-16">
        <h2 class="text-2xl font-semibold mb-4 text-slate-800">POVEZANI PROIZVODI</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($relatedProducts as $klimaUredaj)
                <x-klimaUredaj-card :klimaUredaj="$klimaUredaj" />
            @endforeach
        </div>
    </div>
</div>
@endsection