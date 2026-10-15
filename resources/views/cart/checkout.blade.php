@extends('layout')
@section('content')

<ul class="breadcrumb flex justify-center sm:text-2xl text-gray-500 font-semibold text-center space-x-4">
    <li>
        <a href="/kosarica" class="transition duration-150 hover:text-indigo-700">Pregled košarice</a>
    </li>
    <li class="self-center">
        <i class="fa-solid fa-angle-right"></i>
    </li>
    <li>
        <a href="/checkout" class="text-indigo-700">Podaci za račun i dostavu</a>
    </li>
    <li class="self-center">
        <i class="fa-solid fa-angle-right"></i>
    </li>
    <li>
        <span class="cursor-default">Potvrda narudžbe</span>
    </li>
</ul>

@if ($errors->any())
    <div class="container mx-auto mt-2 p-4 sm:text-lg text-white font-semibold">
        <ul class="space-y-2"> 
            @foreach ($errors->all() as $error)
                <li class="bg-red-500 p-4 rounded"><i class="fa-solid fa-triangle-exclamation"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/checkout" method="POST"
    class="container mx-auto my-12 p-4 lg:grid lg:grid-cols-10 space-y-6 lg:space-y-0">
    @csrf
    
    {{-- PODACI KUPCA --}}
    <div class="col-span-6 pr-10">
        <h3 class="font-bold text-2xl text-slate-800 mb-4">Podaci za plaćanje i dostavu</h3>
        <div class="space-y-4">
            <div>
                <label for="billing_first_name" class="font-medium text-gray-700">Ime <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_first_name" id="billing_first_name" value="{{old('billing_first_name')}}" autocomplete="given-name">
            </div>
            @error('billing_first_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="billing_last_name" class="font-medium text-gray-700">Prezime <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_last_name" id="billing_last_name" value="{{old('billing_last_name')}}" autocomplete="family-name">
            </div>
            @error('billing_last_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="billing_company" class="font-medium text-gray-700">Naziv poduzeća <span class="text-gray-400 text-sm">(neobavezno)</span></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_company" id="billing_company" value="{{old('billing_company')}}" autocomplete="organization">
            </div>

            <div>
                <label for="billing_country" class="font-medium text-gray-700">Država / Regija <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <strong class="block p-2 bg-gray-50 border border-gray-300 rounded">Hrvatska</strong>
                <input type="hidden" name="billing_country" id="billing_country" value="HR" autocomplete="country">
            </div>

            <div>
                <label for="billing_address_1" class="font-medium text-gray-700">Ulica i kućni broj <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_address_1" id="billing_address_1" placeholder="Ulica i kućni broj" value="{{old('billing_address_1')}}" autocomplete="address-line1">
            </div>
            @error('billing_address_1')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="billing_address_2" class="font-medium text-gray-700">Stan, apartman, kat <span class="text-gray-400 text-sm">(neobavezno)</span></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_address_2" id="billing_address_2" value="{{old('billing_address_2')}}" autocomplete="address-line2">
            </div>

            <div>
                <label for="billing_city" class="font-medium text-gray-700">Grad <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_city" id="billing_city" value="{{old('billing_city')}}" autocomplete="address-level2">
            </div>
            @error('billing_city')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="billing_state" class="font-medium text-gray-700">Županija <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_state" id="billing_state" value="{{old('billing_state')}}" autocomplete="address-level1">
            </div>
            @error('billing_state')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="billing_postcode" class="font-medium text-gray-700">Poštanski broj <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="text" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_postcode" id="billing_postcode" value="{{old('billing_postcode')}}" autocomplete="postal-code">
            </div>
            @error('billing_postcode')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="billing_phone" class="font-medium text-gray-700">Telefon <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="tel" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_phone" id="billing_phone" value="{{old('billing_phone')}}" autocomplete="tel">
            </div>
            @error('billing_phone')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="billing_email" class="font-medium text-gray-700">Adresa e-pošte <abbr class="required text-red-500" title="Obavezno">*</abbr></label><br>
                <input type="email" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" name="billing_email" id="billing_email" value="{{old('billing_email')}}" autocomplete="email">
            </div>
            @error('billing_email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div>
                <label for="order_comments" class="font-medium text-gray-700">Napomene uz narudžbu <span class="text-gray-400 text-sm">(neobavezno)</span></label><br>
                <textarea name="order_comments" class="input-text w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-indigo-500 focus:outline-none" id="order_comments" rows="4">{{old('order_comments')}}</textarea>
            </div>
        </div>
    </div>

    {{-- UVJETI PLAĆANJA I REZIME --}}
    <div class="border rounded-lg border-gray-300 bg-white p-6 col-span-4 shadow-sm">
        <h3 class="text-xl font-bold text-slate-800 border-b pb-3">Vaša narudžba</h3>
        <livewire:checkout />
        
        <h4 class="text-lg font-bold mt-6 pt-4 text-slate-800 border-t">Metode plaćanja</h4>
        <div class="space-y-4 py-4 border-b text-sm text-gray-600">
            <div>
                <input type="radio" class="mr-2" name="metoda_placanja" id="placanje-po-ponudi-input" value="1" @if (old('metoda_placanja') === "1") checked @endif>
                <label for="placanje-po-ponudi-input" class="font-bold text-slate-800">Plaćanje po ponudi</label>
                <p class="text-xs ml-5 mt-1">Plaćanje virmanom / općom uplatnicom ili internet bankarstvom po primljenoj ponudi.</p>
            </div>
            <div>
                <input type="radio" class="mr-2" name="metoda_placanja" id="placanje-na-rate-input" value="2" @if (old('metoda_placanja') === "2") checked @endif>
                <label for="placanje-na-rate-input" class="font-bold text-slate-800">Plaćanje karticom na rate</label>
                <p class="text-xs ml-5 mt-1">Mogućnost obročnog plaćanja kreditnim karticama vodećih banaka.</p>
            </div>
            <div>
                <input type="radio" class="mr-2" name="metoda_placanja" id="placanje-gotovinom-input" value="3" @if (old('metoda_placanja') === "3") checked @endif>
                <label for="placanje-gotovinom-input" class="font-bold text-slate-800">Gotovinsko plaćanje</label>
                <p class="text-xs ml-5 mt-1">Plaćanje gotovinom prilikom preuzimanja ili ovlaštene montaže uređaja.</p>
            </div>
        </div>

        @error('metoda_placanja')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <p class="my-4 text-xs text-gray-500 leading-relaxed">Vaši osobni podaci koristit će se isključivo za obradu vaše narudžbe i unaprjeđenje korisničkog iskustva sukladno <a href="/pravila-o-privatnosti" class="text-indigo-600 underline">pravilima privatnosti</a>.</p>

        <div class="mt-4">
            <label class="flex items-start space-x-2 text-sm">
                <input type="checkbox" name="terms" id="terms" class="mt-1">
                <span>Pročitao/la sam i slažem se s uvjetima korištenja i odredbama web-stranice. <abbr class="required text-red-500" title="Obavezno">*</abbr></span>
            </label>
        </div>
        @error('terms')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <div class="text-end mt-6">
            <button type="submit" class="w-full bg-slate-800 transition duration-150 hover:bg-slate-700 text-white font-bold text-lg text-center py-3 rounded shadow">
                POTVRDI NARUDŽBU
            </button>
        </div>
    </div>
</form>

@endsection