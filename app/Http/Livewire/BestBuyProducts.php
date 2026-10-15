<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KlimaUredaj;

class BestBuyProducts extends Component
{
    public $products;

    public function mount()
    {
        // Retrieve random best-buy products (adjust the query as needed)
        $this->products = KlimaUredaj::whereHas('bestBuy')
            ->inRandomOrder()
            ->limit(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.best-buy-products');
    }
}
