@extends('layout')
@section('content')

@php
    $breadcrumbs = [
            ['title' => 'NASLOVNICA', 'url' => '/'],
            ['title' => 'KLIMA UREĐAJI', 'url' => '']
        ];
@endphp


{{-- @livewire("product-list") --}}

@php
    $brands = array(
        "Azuri",
        "Daikin",
        "Fujitsu",
        "Gree",
        "Haier",
        "Hitachi",
        "Hyundai",
        "Korel",
        "LG",
        "Maxon",
        "Midea",
        "Mitsubishi",
        "Qzen",
        "Samsung",
        "Tesla",
        "Toshiba",
        "Vivax",
        "Vox",
        "Trotec",
    );
    $powers = array("2.5" , "3.5", "4.0", "4.5", "5.0", "5.5", "6.0", "6.5", "7.0");
    $areas = array("25", "35", "45", "55", "65", "75");
    $energyLabels = array("A" , "A++", "A+++");
@endphp

<div class="lg:flex mb-4 px-4 container mx-auto ">
    {{-- FILTER PROIZVODA --}}
    <div id="product-filter" 
        class="w-64 h-full lg:h-fit shrink-0 p-4 fixed top-0 left-0 lg:static translate-x-[-140%] lg:translate-x-[0] bg-sky-200 lg:bg-white z-50 lg:z-0 rounded transition duration-150 lg:duration-0 overflow-y-auto">
            <div class="flex justify-between mb-4">
                <a href="{{ route('shop') }}" class="block bg-orange-500 p-2 text-white rounded">PONIŠTI ODABRANO</a>
                <button id="close-filter" onclick="toggleFilter()" class="text-3xl lg:hidden"><i class="fa-solid fa-xmark"></i></button>
            </div>
            @include('components.product-filter')
    </div>


    {{-- ISPIS PROIZVODA --}}
    <div class="w-full">
        {{-- FILTER BUTTONS--}}
        <div class="flex flex-col space-y-2 sm:space-y-0 sm:flex-row justify-around align-baseline mb-8 ">
            <button onclick="toggleFilter()" class="lg:hidden p-4 border-2 rounded font-bold transition duration-150 hover:border-gray-600 text-slate-700" id="filter-button">
                <i class="fa-solid fa-filter mr-2"></i><span>Filter proizvoda</span>
            </button>
            <label class="self-center text-red-500 hover:text-red-600 font-semibold cursor-pointer">
                <input type="checkbox" id="onSaleCheckbox" name="onSaleCheckbox" onchange="filterDiscounted()" 
                {{isset($selectedOnSale) ? $selectedOnSale === '1' ? 'checked' : '' : ''}}> Na Akciji
            </label>
            <label class="self-center text-gray-500 hover:text-gray-600 font-semibold cursor-pointer">
                <input type="checkbox" id="bestBuyCheckbox" name="bestBuyCheckbox" onchange="filterBestBuys()" 
                {{isset($selectedBestBuy) ? $selectedBestBuy === '1' ? 'checked' : '' : ''}}> Najprodavanije
            </label>
        </div>
        
        @if ($klimaUredaji->isEmpty())
            <p class="text-gray-500 font-semibold">Nema nađenih proizvoda.</p>
        @else
            <div class="grid lg:grid-cols-1 xl:grid-cols-2 gap-2">
                @foreach($klimaUredaji as $klimaUredaj)
                    {{-- <x-klimaUredaj-card :klimaUredaj="$klimaUredaj" /> --}}
                    <x-klimaUredaj-card :klimaUredaj="$klimaUredaj" />
                @endforeach
            </div>
        @endif
    </div>
</div>

 {{-- PAGINACIJA --}}
 <div class="mt-6 p-4 container mx-auto">
    @if (isset($selectedBrand) || 
        isset($selectedMinPrice) || 
        isset($selectedMaxPrice) || 
        isset($selectedPower) ||
        isset($selectedArea) ||
        isset($selectedEnergyLabel) || 
        isset($selectedOnSale) ||
        isset($selectedBestBuy))
        {{ $klimaUredaji->appends([
            'brend' => $selectedBrand, 
            'min-cijena' => $selectedMinPrice,
            'max-cijena' => $selectedMaxPrice,
            'snaga' => $selectedPower,
            'prostor' => $selectedArea,
            'energetska-klasa' => $selectedEnergyLabel,
            'onSale' => $selectedOnSale,
            'bestBuy' => $selectedBestBuy
            ])->links() }}
    @else
        {{ $klimaUredaji->links() }}
    @endif
</div>

@endsection

