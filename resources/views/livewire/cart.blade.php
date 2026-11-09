<section>
    @if($cartCount > 0)
    <div class="container font-semibold text-gray-600 border-2 border-indigo-300 rounded-lg mx-auto my-8 px-4"> 
        <div class="text-center">
            @foreach($cartItems as $cartItem)
            @php
            $images = explode(',', $cartItem->product->slike);
            @endphp
            <div class="border-b-2 py-4 space-y-2 lg:flex lg:justify-around lg:items-center">
                <div class="text-2xl text-end">
                    <button wire:click="removeProductFromCart({{ $cartItem->product->id }})">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div>
                    <img src="{{ asset('images/' . $cartItem->product->brend . '/' . $images[2]) }}"
                        alt="{{$cartItem->product->naslov}}" class="h-36 self-center rounded shadow-lg mx-auto">
                </div>
                <div class="text-lg">
                    <span>{{ $cartItem->product->naslov }}</span>
                </div>
                <div>
                    @if ($cartItem->product->onSale)
                    <span>
                        {{ number_format(($cartItem->product->cijena - ($cartItem->product->cijena *
                        ($cartItem->product->onSale->discount / 100))), 2) }}€
                    </span>
                    @else
                    <span>{{ number_format($cartItem->product->cijena, 2)
                        }}€</span>
                    @endif
                </div>
                <div class="space-x-1">
                    <button class="px-2 border-2 rounded w-10 transition duration-150 hover:border-gray-500" wire:click="decrementCartProductQuantity({{ $cartItem->product->id }})"@if ($cartItem->quantity <= 1)
                        disabled @endif>-</button>
                    <span>x{{ $cartItem->quantity }}</span>
                    <button class="px-2 border-2 rounded w-10 transition duration-150 hover:border-gray-500" wire:click="incrementCartProductQuantity({{ $cartItem->product->id }})" @if ($cartItem->quantity >= 10)
                        disabled @endif>+</button>
                </div>
                <div>
                    @if ($cartItem->product->onSale)
                    <span class="text-indigo-700">
                        {{ number_format(($cartItem->product->cijena - ($cartItem->product->cijena *
                        ($cartItem->product->onSale->discount / 100))) * $cartItem->quantity, 2) }}€
                    </span>
                    @else
                    <span class="text-indigo-700">{{ number_format($cartItem->product->cijena *
                        $cartItem->quantity, 2) }}€</span>
                    @endif
                </div>
            </div>
            @endforeach
            <div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <div class="coupon">
                            <form action="">
                                <input type="text" name="coupon_code" class="border-2 px-2 rounded mb-2" id="coupon_code"
                                    value="" placeholder="Kod kupona">
                                <button type="submit"
                                    class="border-2 shadow rounded p-2 transition duration-150 hover:bg-gray-100"
                                    name="update_cart" value="Ažuriraj košaricu">Primjeni kupon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t-2">
                <div class="p-4 text-end space-x-2">
                    <span>Ukupno:</span>
                    <span class="text-2xl font-semibold">{{ number_format($cartTotal, 2) }}€</span><br>       
                    <a class="inline-block bg-indigo-700 p-2 rounded text-white font-semibold transition duration-150 hover:bg-indigo-600 mt-2 text-center"
                        href="/checkout
                        ">
                        KRENI NA PLAĆANJE
                    </a>
                </td>
            </div>
        </div>   
    </div>
    
    {{-- DOSTAVA --}}
    <div class="font-semibold text-gray-600">
        <div class="p-4" data-title="Dostava">
            <h4 class="text-xl text-indigo-700 font-semibold mb-2">Dostava</h4>
            <p class="text-sm mb-1">Besplatna dostava</p>
            <p class="mb-1">Opcije dostave bit će ažurirane na stranici naplate.</p>
            <p class="mb-4">Izračunaj dostavu</p>


            <form class="w-full space-y-2"
                action="https://klimauredajihrvatska.hr/kosarica/" method="post">
                
                <p class="form-row form-row-wide" id="calc_shipping_country_field">
                    <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state w-full border-2 rounded p-2"
                        rel="calc_shipping_state">
                        <option value="default">Izaberi državu /regiju…</option>
                        <option value="HR" selected="selected">Hrvatska</option>
                    </select>
                </p>

                <p class="form-row validate-required address-field form-row-wide"
                    id="calc_shipping_state_field">
                    <input type="text" class="input-text w-full border-2 rounded p-2" value="" placeholder="Županija"
                        name="calc_shipping_state" id="calc_shipping_state" data-placeholder="Županija">
                </p>

                <p class="form-row validate-required address-field form-row-wide"
                    id="calc_shipping_city_field">
                    <input type="text" class="input-text w-full border-2 rounded p-2" value="" placeholder="Grad"
                        name="calc_shipping_city" id="calc_shipping_city" data-placeholder="Grad">
                </p>

                <p class="form-row validate-required address-field form-row-wide"
                    id="calc_shipping_postcode_field">
                    <input type="text" class="input-text w-full border-2 rounded p-2" value="" placeholder="Poštanski broj"
                        name="calc_shipping_postcode" id="calc_shipping_postcode"
                        data-placeholder="Poštanski broj">
                </p>

                <p><button type="submit" name="calc_shipping" value="1"
                        class="border-2 shadow rounded p-2 transition duration-150 hover:bg-gray-100">Ažurirajte ukupno</button></p>

            </form>
        </div>
      
        <div class="py-2 text-end space-x-2">
            <span>Ukupno:</span>
            <span>
                <span class="woocommerce-Price-amount amount">
                    <bdi>{{ number_format($cartTotal, 2) }}<span>€</span></bdi>
                </span>
            </span>
        </div>
        
    </div>
    @else
    <div class="cart-empty-page text-center my-16">
        <i class="fa-solid fa-bag-shopping text-5xl text-sky-600"></i>
        <p class="px-3 py-2 cart-empty font-semibold">Vaša košarica je prazna</p>
        <p class="return-to-shop mt-8">
            <a class="inline-block bg-indigo-700 p-4 rounded text-white font-semibold transition duration-150 hover:bg-indigo-600"
                href="/klima-uredaji">
                Povratak u trgovinu
            </a>
        </p>
    </div>
    @endif
</section>
