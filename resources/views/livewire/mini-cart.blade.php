<div>
    <div class="flex space-x-5 items-center relative group border-l-2 pl-2 cursor-pointer">
        <span class="relative">
            <i class="fa-solid fa-cart-shopping text-3xl"></i>
            <span class="absolute left-7 bottom-5 px-1 bg-red-500 rounded-full text-white text-sm font-bold">
                {{ $cartCount }}
            </span>
        </span>
        <span class="leading-5 font-bold text-lg text-sky-600">
            <span class="block">Košarica</span>
            <span class="block text-start">
                {{-- Display the sum of product prices --}}
                {{ number_format($cartTotal, 2) }}€
            </span>
        </span>
        @if($cartCount > 0)
            <div class="absolute top-6 right-3 w-80 z-10 bg-sky-200 font-semibold text-gray-600 border-2 border-indigo-300 p-4 rounded-lg shadow-xl hidden group-hover:block">
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
                <div class="flex justify-between mt-2">
                    <a href="/kosarica" class="text-white font-bold p-2 rounded transition duration-150 bg-indigo-500 hover:bg-indigo-700">Vidi košaricu</a>
                    <a href="/checkout" class="text-white font-bold p-2 rounded transition duration-150 bg-indigo-500 hover:bg-indigo-700">Plaćanje</a>
                </div>
            </div>
        @else
            <div class="absolute top-6 right-3 pt-2 pb-4 px-2 w-80 bg-gray-800 text-white text-sm font-bold rounded-lg invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-[top] duration-500 group-hover:top-12">
                Nema proizvoda u košarici.
            </div>
            <div class="absolute left-12 top-4 bg-gray-800 w-4 h-4 rotate-45 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-[top] duration-500 group-hover:top-10">
            </div>
        @endif
    </div>
</div>
