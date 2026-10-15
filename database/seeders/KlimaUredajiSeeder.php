<?php

namespace Database\Seeders;

use App\Models\KlimaUredaj;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KlimaUredajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(storage_path('app/klima_uređaji_podaci.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            KlimaUredaj::create([
                'slug' => $item['slug'],
                'naslov' => $item['naslov'],
                'cijena' => floatval($item['cijena']),
                'brend' => $item['brend'],
                'opis' => $item['opis'],
                'slike' => $item['slike'],
                'ucinak_hladenja_kw' => $item['ucinak_hladenja_kw'] ?? null,
                'energetski_razred_hladenja' => $item['energetski_razred_hladenja'] ?? null,
                'ucinak_grijanja_kw' => $item['ucinak_grijanja_kw'] ?? null,
                'energetski_razred_grijanja' => $item['energetski_razred_grijanja'] ?? null,
                'velicina_prostora_m2' => $item['velicina_prostora_m2'] ?? null,
                'podrucje_rada_grijanje_c' => $item['podrucje_rada_grijanje_c'] ?? null,
                'podrucje_rada_hladenje_c' => $item['podrucje_rada_hladenje_c'] ?? null,
                'maksimalna_visinska_razlika_m' => $item['maksimalna_visinska_razlika_m'] ?? null,
                'maksimalna_duljina_cijevi_m' => $item['maksimalna_duljina_cijevi_m'] ?? null,
                'promjer_cijevi_plin_mm' => $item['promjer_cijevi_plin_mm'] ?? null,
                'promjer_cijevi_tekucina_mm' => $item['promjer_cijevi_tekucina_mm'] ?? null,
                'razina_buke_vanjske_jedinice' => $item['razina_buke_vanjske_jedinice'] ?? null,
                'dimenzije_vanjske_jedinice_v_s_d' => $item['dimenzije_vanjske_jedinice_v_s_d'] ?? null,
                'razina_buke_hladenje_uj' => $item['razina_buke_hladenje_uj'] ?? null,
                'dimenzije_unutarnje_jedinice_v_s_d' => $item['dimenzije_unutarnje_jedinice_v_s_d'] ?? null,
                'radna_tvar' => $item['radna_tvar'] ?? null,
                'raspon_ucinka_hladenja_kw' => $item['raspon_ucinka_hladenja_kw'] ?? null,
                'seer' => $item['seer'] ?? null,
                'raspon_ucinka_grijanja_kw' => $item['raspon_ucinka_grijanja_kw'] ?? null,
                'scop' => $item['scop'] ?? null,
                'snaga_kw' => $item['snaga_kw'],
                'prostor_m2' => $item['prostor_m2'],
                // ... other columns
            ]);
        }
    }
}
