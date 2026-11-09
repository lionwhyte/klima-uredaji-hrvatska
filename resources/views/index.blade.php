@extends('layout')
@section('content')

{{-- 1. Hero sekcija dobrodošlice --}}
<section class="container px-4 mx-auto mb-8">
    @include('partials._hero')
</section>

{{-- 2. Brza pretraga / filter klima uređaja --}}
<section class="container px-4 mx-auto mb-10">
    @include('components.search-product')
</section>

{{-- 3. Proizvodi na akciji (Livewire reaktivnost) --}}
<section class="container px-4 py-8 mx-auto bg-gray-50 rounded-lg shadow-sm mb-10">
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-slate-800">Izdvojeno iz akcije</h2>
        <p class="text-gray-600">Iskoristite popuste na odabrane modele klima uređaja</p>
    </div>
    <livewire:on-sale-products />
</section>

{{-- 4. Najprodavaniji / Best-Buy modeli --}}
<section class="container px-4 py-8 mx-auto bg-gray-50 rounded-lg shadow-sm mb-12">
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-slate-800">Najprodavaniji modeli</h2>
        <p class="text-gray-600">Provjerite uređaje s najboljim omjerom cijene i kvalitete</p>
    </div>
    <livewire:best-buy-products />
</section>

{{-- 5. Nova sekcija: Zašto odabrati nas? --}}
<section class="container px-4 mx-auto mb-12 py-12 bg-white rounded-lg shadow-sm border border-gray-100">
    <div class="text-center max-w-xl mx-auto mb-10">
        <h2 class="text-2xl font-bold text-slate-800">Zašto odabrati Klima Webshop?</h2>
        <p class="text-gray-600 mt-2">Pružamo cjelovitu uslugu od stručnog savjetovanja do montaže i održavanja.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center px-4">
        <div class="p-6 bg-slate-50 rounded-lg">
            <div class="w-12 h-12 bg-sky-100 text-sky-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3 class="font-bold text-lg text-slate-800 mb-2">Ovlaštena montaža</h3>
            <p class="text-gray-600 text-sm">Stručna i brza ugradnja klima uređaja uz ovlaštenje i jamstvo na izvedene radove.</p>
        </div>
        <div class="p-6 bg-slate-50 rounded-lg">
            <div class="w-12 h-12 bg-sky-100 text-sky-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                <i class="fa-solid fa-headset"></i>
            </div>
            <h3 class="font-bold text-lg text-slate-800 mb-2">Stručno savjetovanje</h3>
            <p class="text-gray-600 text-sm">Pomažemo vam odabrati idealan kapacitet i model klase prilagođen vašem prostoru.</p>
        </div>
        <div class="p-6 bg-slate-50 rounded-lg">
            <div class="w-12 h-12 bg-sky-100 text-sky-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                <i class="fa-solid fa-truck-fast"></i>
            </div>
            <h3 class="font-bold text-lg text-slate-800 mb-2">Brza dostava</h3>
            <p class="text-gray-600 text-sm">Sigurna i brza dostava naručenih uređaja direktno na vašu adresu diljem regije.</p>
        </div>
    </div>
</section>

{{-- 6. Profesionalni Call-to-Action (Montaža i podrška) --}}
<section class="container px-4 mx-auto bg-slate-800 text-white rounded-lg py-16 text-center mb-12 shadow-md">
    <div class="max-w-2xl mx-auto space-y-4">
        <h2 class="text-3xl font-bold">Trebate pomoć pri odabiru ili montaži?</h2>
        <p class="text-gray-300">Nudimo stručni savjet, brzu dostavu i ovlaštenu montažu klima uređaja diljem regije.</p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="tel:+38512345678" class="px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-semibold rounded-lg transition duration-150">
                <i class="fa-solid fa-phone mr-2"></i> +385 1 234 5678
            </a>
            <a href="/kontakt" class="px-6 py-3 border-2 border-white text-white hover:bg-white hover:text-slate-800 font-semibold rounded-lg transition duration-150">
                Pošaljite upit
            </a>
        </div>
    </div>
</section>

@endsection