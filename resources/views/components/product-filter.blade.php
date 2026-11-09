<form action="{{ route('searchProducts') }}" method="GET" class="space-y-4" id="product-filter-form">
    {{-- NA AKCIJI --}}
    <input type="hidden" name="onSale" id="onSaleInput" value="{{ request('onSale', '') }}">
    <input type="hidden" name="bestBuy" id="bestBuyInput" value="{{ request('bestBuy', '') }}">


    {{-- BRENDOVI --}}
    <div class="p-4 border-2 rounded">
        <h4 class="text-xl font-semibold mb-4">PROIZVOĐAČ</h4>
        <label class="block ml-2 text-gray-600 font-semibold">
            <input type="radio" name="brend" value="" {{ !isset($selectedBrand) ? 'checked' : '' }}>
            SVI PROIZVODI
        </label>
        @foreach($brands as $brand)
            <label class="block ml-2 text-gray-600 font-semibold">
                <input type="radio" name="brend" value="{{ $brand }}" {{ isset($selectedBrand) ? $brand === $selectedBrand ? 'checked' : ''  : ''}}>
                <span>{{ $brand }}</span>
            </label>
        @endforeach
    </div>
     {{-- CIJENA --}}
     <div class="p-4 border-2 rounded">
        <h4 class="text-xl font-semibold mb-4">CIJENA</h4>
        <div class="price-input">
            <div class="field">
            <input type="number" class="input-min" value="{{ isset($selectedMinPrice) ? $selectedMinPrice : 200}}" min="200" max="2000" name="min-cijena">
            </div>
            <div class="field">
            <input type="number" class="input-max" value="{{ isset($selectedMaxPrice) ? $selectedMaxPrice : 2000}}" min="200" max="2000" name="max-cijena">
            </div>
        </div>
        <div class="slider">
            <div class="progress"></div>
        </div>
        <div class="range-input">
            <input type="range" class="range-min" min="200" max="2000" value="{{ isset($selectedMinPrice) ? $selectedMinPrice : 200}}" step="1">
            <input type="range" class="range-max" min="200" max="2000" value="{{ isset($selectedMaxPrice) ? $selectedMaxPrice : 2000}}" step="1">
        </div>
    </div>
 
    {{-- SNAGE --}}
    <div class="p-4 border-2 rounded">
        <h4 class="text-xl font-semibold mb-4">SNAGA</h4>
        <label class="block ml-2 text-gray-600 font-semibold">
            <input type="radio" name="snaga" value="" {{ !isset($selectedPower) ? 'checked' : '' }}>
            SVI PROIZVODI
        </label>
        @foreach($powers as $power)
            <label class="block ml-2 text-gray-600 font-semibold">
                <input type="radio" name="snaga" value="{{ $power }}" {{ isset($selectedPower) ? $power === $selectedPower ? 'checked' : ''  : ''}}>
                <span>{{ $power }} kw</span>
            </label>
        @endforeach
    </div>
    {{-- PROSTOR --}}
    <div class="p-4 border-2 rounded">
        <h4 class="text-xl font-semibold mb-4">PRIKLADNO ZA PROSTOR</h4>
        <label class="block ml-2 text-gray-600 font-semibold">
            <input type="radio" name="prostor" value="" {{ !isset($selectedArea) ? 'checked' : '' }}>
            SVI PROIZVODI
        </label>
        @foreach($areas as $area)
            <label class="block ml-2 text-gray-600 font-semibold">
                <input type="radio" name="prostor" value="{{ $area }}" {{ isset($selectedArea) ? $area === $selectedArea ? 'checked' : ''  : ''}}>
                <span>{{ $area }} m2</span>
            </label>
        @endforeach
    </div>
     {{-- ENERGETSKA KLASA --}}
     <div class="p-4 border-2 rounded">
        <h4 class="text-xl font-semibold mb-4">ENERGETSKA KLASA</h4>
        <label class="block ml-2 text-gray-600 font-semibold">
            <input type="radio" name="energetska-klasa" value="" {{ !isset($selectedEnergyLabel) ? 'checked' : '' }}>
            SVI PROIZVODI
        </label>
        @foreach($energyLabels as $energyLabel)
            <label class="block ml-2 text-gray-600 font-semibold">
                <input type="radio" name="energetska-klasa" value="{{ $energyLabel }}" {{ isset($selectedEnergyLabel) ? $energyLabel === $selectedEnergyLabel ? 'checked' : ''  : ''}}>
                <span>{{ $energyLabel }}</span>
            </label>
        @endforeach
    </div>
    <button type="submit" class="bg-indigo-500 py-2 px-6 hover:bg-indigo-700 transition duration-150 text-white font-bold rounded">POTRAŽI</button>
</form>