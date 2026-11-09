{{-- PODACI O PROIZVODIMA --}}
@if($cartCount > 0)
    <div class="font-semibold text-gray-600 p-4 rounded">
        @foreach($cartItems as $cartItem)
            @php
                $images = explode(',', $cartItem->product->slike);
            @endphp
            <div class="flex justify-between gap-4 mb-4">
                <img src="{{ asset('images/' . $cartItem->product->brend . '/' . $images[2]) }}" alt="{{$cartItem->product->naslov}}" class="h-8 self-center rounded shadow-lg">
                <span class="self-center">x{{ $cartItem->quantity }}</span>
                <span class="text-sm">{{ $cartItem->product->naslov }}</span>
                @if ($cartItem->product->onSale)
                    <span class="self-center font-bold text-sm">
                        {{ number_format(($cartItem->product->cijena - ($cartItem->product->cijena * ($cartItem->product->onSale->discount / 100))) * $cartItem->quantity, 2) }}€
                    </span>
                @else
                    <span class="self-center font-bold text-sm">{{ number_format($cartItem->product->cijena * $cartItem->quantity, 2) }}€</span>
                @endif
                
            </div>
        @endforeach
        <hr class="my-2">
        <div class="flex justify-between font-bold">
            <span>Ukupno:</span>
            <span>{{ number_format($cartTotal, 2) }}€</span>
        </div>
    </div>
@else
    <script>window.location.href = "/kosarica";</script>
@endif

        

