<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\KlimaUredaj;
use Carbon\Carbon;

class PromoProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Očistimo stare unose da izbjegnemo duplikate
        DB::table('on_sales')->truncate();
        DB::table('best_buys')->truncate();

        // 1. BEST-BUY: Pronađimo 3 Tesla i Midea modela jačine 3.5 kW
        $bestBuyProducts = KlimaUredaj::whereIn('brend', ['Tesla', 'Midea'])
            ->where('ucinak_hladenja_kw', 3.5)
            ->limit(3)
            ->pluck('id');

        foreach ($bestBuyProducts as $productId) {
            DB::table('best_buys')->insert([
                'klima_uredaj_id' => $productId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // 2. ON SALE (AKCIJA): Pronađimo 3 Mitsubishi i Tesla modela snage između 2.5 i 5.0 kW
        $onSaleProducts = KlimaUredaj::whereIn('brend', ['Mitsubishi', 'Tesla'])
            ->whereBetween('ucinak_hladenja_kw', [2.5, 5.0])
            ->limit(3)
            ->pluck('id');

        $discounts = [15.00, 18.00, 20.00]; // Različiti postoci popusta
        $i = 0;

        foreach ($onSaleProducts as $productId) {
            DB::table('on_sales')->insert([
                'klima_uredaj_id' => $productId,
                'discount' => $discounts[$i % count($discounts)],
                'time_till_sale' => Carbon::now()->addDays(rand(5, 10)), // Rok trajanja akcije
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $i++;
        }
    }
}