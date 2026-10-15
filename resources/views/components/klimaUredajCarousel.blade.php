@props(['klimaUredaj'])
@php
    $slike = explode(',', $klimaUredaj->slike);

    // Assuming $time_till_sale is in the format 'Y-m-d H:i:s'
    if (isset($klimaUredaj->onSale->time_till_sale)) {
        date_default_timezone_set('Europe/Zagreb');
        $targetDateTime = \Carbon\Carbon::parse($klimaUredaj->onSale->time_till_sale);

        // Calculate the time difference
        $now = \Carbon\Carbon::now();
        $timeDifference = $targetDateTime->diff($now);

        // Format the time left
        $timeLeft = $timeDifference->format('%ad %hh %im %ss');
    }
@endphp

@if($klimaUredaj->onSale)
    <span class="absolute top-2 left-2 z-10 text-white p-1 rounded bg-red-500 font-semibold">-{{ $klimaUredaj->onSale->discount }}%</span>
@endif
<div class="flex transition duration-150 translate-0" id="carousel"> {{-- ovdje obavezno translate klasa mora na zadnje mjesto u nizu klasa --}}
    @if (!strpos($slike[2], "400x400"))
    <img class="w-fit border-2 rounded" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . (isset($slike[2]) && !empty($slike[2]) ? $slike[2] : $slike[0])) }}" alt="{{ $klimaUredaj->naslov }}" />
    @endif
    
    <img class="w-fit border-2 rounded" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . (isset($slike[1]) && !empty($slike[1]) ? $slike[1] : $slike[0])) }}" alt="{{ $klimaUredaj->naslov }}" /> 
    @if (!strpos($slike[3], "400x400"))
    <img class="w-fit border-2 rounded" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . $slike[3]) }}" alt="{{ $klimaUredaj->naslov }}" />
    @endif    
    <img class="w-fit border-2 rounded" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . $slike[0]) }}" alt="{{ $klimaUredaj->naslov }}" /> 
</div>
@if($klimaUredaj->onSale)
    <div class="onSaleCountdown font-semibold text-white text-sm bg-indigo-700/75 inline-block px-4 py-2 w-full text-center" data-time="{{$klimaUredaj->onSale->time_till_sale}}">
        {{$timeLeft}}
    </div>
@endif  
<div class="flex justify-center space-x-4 mb-8 mt-4">
    @if (!strpos($slike[2], "400x400"))
    <img class="w-8 lg:w-12 border-2 rounded cursor-pointer thumb border-gray-500" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . (isset($slike[2]) && !empty($slike[2]) ? $slike[2] : $slike[0])) }}" alt="{{ $klimaUredaj->naslov }}" />
    @endif
    <img class="w-8 lg:w-12 border-2 rounded cursor-pointer thumb" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . (isset($slike[1]) && !empty($slike[1]) ? $slike[1] : $slike[0])) }}" alt="{{ $klimaUredaj->naslov }}" /> 
    @if (!strpos($slike[3], "400x400"))
    <img class="w-8 lg:w-12 border-2 rounded cursor-pointer thumb" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . $slike[3]) }}" alt="{{ $klimaUredaj->naslov }}" />  
    @endif    
    <img class="w-8 lg:w-12 border-2 rounded cursor-pointer thumb" 
        src="{{ asset('images/' . $klimaUredaj->brend . '/' . $slike[0]) }}" alt="{{ $klimaUredaj->naslov }}" /> 
</div>