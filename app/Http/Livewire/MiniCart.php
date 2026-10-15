<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\CalculatesCart;

class MiniCart extends Component
{
    use CalculatesCart;

    public $cartCount = 0;
    public $cartTotal = 0;
    public $cartItems;

    protected $listeners = ['productCartUpdated' => 'updateCart'];

    public function render()
    {
        return view('livewire.mini-cart');
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
}