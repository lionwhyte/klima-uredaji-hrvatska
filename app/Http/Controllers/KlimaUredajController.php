<?php

namespace App\Http\Controllers;

use App\Models\KlimaUredaj;
use Illuminate\Http\Request;

class KlimaUredajController extends Controller
{
    // LANDING PAGE / SHOP INDEX
    public function index(Request $request)
    {
        $orderBy = $request->get('order') === 'latest' ? 'created_at' : 'naslov';
        $klimaUredaji = KlimaUredaj::orderBy($orderBy)->paginate(10);

        return view('klimaUredaji.index', compact('klimaUredaji'));
    }

    // SINGLE PRODUCT
    public function show($slug)
    {
        $klimaUredaj = KlimaUredaj::where('slug', $slug)->firstOrFail();

        $relatedProducts = KlimaUredaj::where('ucinak_hladenja_kw', '=', $klimaUredaj->ucinak_hladenja_kw)
            ->where('id', '!=', $klimaUredaj->id) // Izbjegavamo prikaz istog proizvoda
            ->inRandomOrder()
            ->limit(8)
            ->get();

        return view('klimaUredaji.show', compact('klimaUredaj', 'relatedProducts'));
    }

    // SEARCH & FILTER PRODUCTS
    public function search(Request $request)
    {
        $filters = [
            'brend' => $request->input('brend'),
            'snaga' => $request->input('snaga'),
            'prostor' => $request->input('prostor'),
            'energetska-klasa' => $request->input('energetska-klasa'),
            'onSale' => $request->input('onSale'),
            'bestBuy' => $request->input('bestBuy'),
        ];

        $priceRange = $this->parsePrice($request->input('cijena'));
        $selectedMinPrice = $request->input('min-cijena', $priceRange['selectedMinPrice']);
        $selectedMaxPrice = $request->input('max-cijena', $priceRange['selectedMaxPrice']);

        $klimaUredajiQuery = KlimaUredaj::query()
            ->when($filters['brend'], fn($q, $val) => $q->where('brend', $val))
            ->when($filters['snaga'], fn($q, $val) => $q->where('snaga_kw', $val))
            ->when($selectedMinPrice, fn($q, $val) => $q->where('cijena', '>=', $val))
            ->when($selectedMaxPrice, fn($q, $val) => $q->where('cijena', '<=', $val))
            ->when($filters['prostor'], fn($q, $val) => $q->where('prostor_m2', $val))
            ->when($filters['energetska-klasa'], fn($q, $val) => $q->where('energetski_razred_hladenja', $val));

        // Upravljanje akcijskim i best-buy statusima
        if ($filters['onSale'] && $filters['bestBuy']) {
            $klimaUredajiQuery->has('onSale')->has('bestBuy');
        } elseif ($filters['onSale']) {
            $klimaUredajiQuery->has('onSale');
        } elseif ($filters['bestBuy']) {
            $klimaUredajiQuery->has('bestBuy');
        }

        $klimaUredaji = $klimaUredajiQuery->paginate(10);

        // Pakiramo sve filtere u view za očuvanje stanja forme
        return view('klimaUredaji.index', array_merge(
            compact('klimaUredaji', 'selectedMinPrice', 'selectedMaxPrice'),
            [
                'selectedBrand' => $filters['brend'],
                'selectedPower' => $filters['snaga'],
                'selectedArea' => $filters['prostor'],
                'selectedEnergyLabel' => $filters['energetska-klasa'],
                'selectedOnSale' => $filters['onSale'],
                'selectedBestBuy' => $filters['bestBuy'],
            ]
        ));
    }

    // Privatna pomoćna metoda umjesto funkcije unutar metode
    private function parsePrice(?string $price): array
    {
        if (!$price) {
            return ['selectedMinPrice' => null, 'selectedMaxPrice' => null];
        }

        $parts = explode("-", $price);

        return [
            'selectedMinPrice' => $parts[0] ?? null,
            'selectedMaxPrice' => $parts[1] ?? null,
        ];
    }
}