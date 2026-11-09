<?php

namespace App\Http\Livewire\Traits;

use App\Models\Cart as CartModel;

trait CalculatesCart
{
    private function calculateDiscountedPrice($originalPrice, $discountPercentage)
    {
        $discount = $originalPrice * ($discountPercentage / 100);
        return $originalPrice - $discount;
    }

    protected function getCartData()
    {
        $cartItems = CartModel::with('product')->where('session_id', session()->getId())->get();
        $cartCount = $cartItems->sum('quantity');
        
        $cartTotal = $cartItems->sum(function ($item) {
            if ($item->product->onSale) {
                $discountedPrice = $this->calculateDiscountedPrice($item->product->cijena, $item->product->onSale->discount);
                return $discountedPrice * $item->quantity;
            }
            return $item->product->cijena * $item->quantity;
        });

        return [
            'cartItems' => $cartItems,
            'cartCount' => $cartCount,
            'cartTotal' => $cartTotal,
        ];
    }
}