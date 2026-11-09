<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Http\Livewire\Traits\CalculatesCart;

class Cart extends Component
{
    use CalculatesCart;

    public $cartCount = 0;
    public $cartTotal = 0;
    public $cartItems;

    protected $listeners = ['productCartUpdated' => 'updateCart'];

    public function render()
    {
        return view('livewire.cart');
    }

    public function updateCart()
    {
        try {
            $data = $this->getCartData();
            $this->cartItems = $data['cartItems'];
            $this->cartCount = $data['cartCount'];
            $this->cartTotal = $data['cartTotal'];
        } catch (\Exception $e) {
            redirect(500);
        }
    }

    public function mount()
    {
        $this->updateCart();
    }

    public function refreshCart()
    {
        $this->updateCart();
    }

    public function removeProductFromCart($productId)
    {
        try {
            CartModel::where('session_id', session()->getId())
                ->where('product_id', $productId)
                ->delete();
            
            $this->emit('productCartUpdated');
        } catch (\Exception $e) {
            $this->addError('quantity', 'Failed to remove the product from the cart.');
        }
    }

    public function incrementCartProductQuantity($productId)
    {
        try {
            $maxQuantity = 10;
            CartModel::where('session_id', session()->getId())
                ->where('product_id', $productId)
                ->where('quantity', '<', $maxQuantity)
                ->increment('quantity', 1);

            $this->emit('productCartUpdated');
        } catch (\Exception $e) {
            $this->addError('quantity', 'Failed to increment product quantity in the cart.');
        }
    }
    
    public function decrementCartProductQuantity($productId)
    {
        try { 
            $minQuantity = 1;
            CartModel::where('session_id', session()->getId())
            ->where('product_id', $productId)
            ->where('quantity', '>', $minQuantity)
            ->increment('quantity', -1);

            $this->emit('productCartUpdated');
        } catch (\Exception $e) {
            $this->addError('quantity', 'Failed to decrement product quantity in the cart.');
        }
    }
}