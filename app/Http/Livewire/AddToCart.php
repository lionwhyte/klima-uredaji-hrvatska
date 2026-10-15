<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\KlimaUredaj;

class AddToCart extends Component
{
    public $productId;
    public $quantity = 1;

    protected $rules = [
        'quantity' => 'required|integer|min:1',
    ];
    
    protected $listeners = ['updateQuantity'];
    
    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function addToCart()
    {
        $this->validate();

        $product = KlimaUredaj::with('onSale')->find($this->productId);

        if ($product) {
            try {
                $cartItem = Cart::where([
                    'session_id' => session()->getId(),
                    'product_id' => $this->productId,
                ])->first();

                if ($cartItem) {
                    // Update the existing cart entry with the new quantity
                    $cartItem->increment('quantity', $this->quantity);
                } else {
                    // Create a new cart entry
                    Cart::create([
                        'session_id' => session()->getId(),
                        'product_id' => $this->productId,
                        'quantity' => $this->quantity,
                    ]);
                }

                // Reset the quantity after adding to the cart
                $this->emit('productCartUpdated');

            } catch (\Exception $e) {
                // Handle the exception (e.g., log it, show an error message)
                $this->addError('quantity', 'Failed to add the product to the cart.');
            }
        }
    }

    public function updateQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}