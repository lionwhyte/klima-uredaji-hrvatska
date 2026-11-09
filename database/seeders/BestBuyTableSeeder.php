<?php

namespace Database\Seeders;

use App\Models\BestBuy;
use App\Models\KlimaUredaj;
use Illuminate\Database\Seeder;


class BestBuyTableSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have 120 products (KlimaUredaj instances)
        $products = KlimaUredaj::all();

        // Randomly shuffle the products and take the first 20
        $selectedProducts = $products->shuffle()->take(20);

        foreach ($selectedProducts as $product) {
            // You can customize the data you want to seed for the best_buy table
            BestBuy::create([
                'klima_uredaj_id' => $product->id,
                // Add other fields as needed
            ]);
        }
    }
}
