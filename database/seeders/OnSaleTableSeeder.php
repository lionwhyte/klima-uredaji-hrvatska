<?php

namespace Database\Seeders;

use App\Models\OnSale;
use App\Models\KlimaUredaj;
use Illuminate\Database\Seeder;


class OnSaleTableSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have 120 products (KlimaUredaj instances)
        $products = KlimaUredaj::all();

        // Randomly shuffle the products and take the first 50
        $selectedProducts = $products->shuffle()->take(50);

        foreach ($selectedProducts as $product) {
            // Generate a random percentage discount (e.g., between 5% and 20%)
            $percentageDiscount = mt_rand(5, 20);

            // Calculate the expiration time (e.g., 7 days from now)
            $expirationTime = now()->addDays(45);

            // Create an OnSale record
            OnSale::create([
                'klima_uredaj_id' => $product->id,
                'time_till_sale' => $expirationTime,
                'discount' => $percentageDiscount,
            ]);
        }
    }
}
