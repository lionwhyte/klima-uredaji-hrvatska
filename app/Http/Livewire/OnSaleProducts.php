<?php

namespace App\Http\Livewire;

use App\Models\KlimaUredaj;
use Livewire\Component;

class OnSaleProducts extends Component
{
    public $products;

    public function mount()
    {
        // Retrieve random on-sale products (adjust the query as needed)
        $this->products = KlimaUredaj::whereHas('onSale')
            ->inRandomOrder()
            ->limit(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.on-sale-products');
    }
}
