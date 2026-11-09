@props(['klimaUredaj'])

<table class="container">
    <tbody class="flex flex-col space-y-6">
        @if (isset($klimaUredaj->ucinak_hladenja_kw))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Učinak hlađenja (kw)</td>
            <td class="container">{{ $klimaUredaj->ucinak_hladenja_kw }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->energetski_razred_hladenja))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Energetski razred hlađenja</td>
            <td class="container">{{ $klimaUredaj->energetski_razred_hladenja }}</td>
        </tr>  
        @endif
        @if (isset($klimaUredaj->ucinak_grijanja_kw))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Učinak grijanja (kw)</td>
            <td class="container">{{ $klimaUredaj->ucinak_grijanja_kw }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->energetski_razred_grijanja))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Energetski razred grijanja</td>
            <td class="container">{{ $klimaUredaj->energetski_razred_grijanja }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->velicina_prostora_m2))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Veličina prostora m²</td>
            <td class="container">{{ $klimaUredaj->velicina_prostora_m2 }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->podrucje_rada_grijanje_c))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Područje rada - grijanje °C</td>
            <td class="container">{{ $klimaUredaj->podrucje_rada_grijanje_c}}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->podrucje_rada_hladenje_c))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Područje rada - hlađenje °C</td>
            <td class="container">{{ $klimaUredaj->podrucje_rada_hladenje_c }}</td>
        </tr>   
        @endif
        @if (isset($klimaUredaj->maksimalna_visinska_razlika_m))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Maksimalna vis. razlika (m)</td>
            <td class="container">{{ $klimaUredaj->maksimalna_visinska_razlika_m }}</td>
        </tr> 
        @endif
        @if (isset($klimaUredaj->maksimalna_duljina_cijevi_m))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Maksimalna duljina cijevi (m)</td>
            <td class="container">{{ $klimaUredaj->maksimalna_duljina_cijevi_m }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->promjer_cijevi_plin_mm))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Promjer cijevi - plin (mm)</td>
            <td class="container">{{ $klimaUredaj->promjer_cijevi_plin_mm }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->promjer_cijevi_tekucina_mm))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Promjer cijevi - tekućina (mm)</td>
            <td class="container">{{ $klimaUredaj->promjer_cijevi_tekucina_mm }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->razina_buke_vanjske_jedinice))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Razina buke vanjske jedinice (dB)</td>
            <td class="container">{{ $klimaUredaj->razina_buke_vanjske_jedinice }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->razina_buke_hladenje_uj))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Razina buke unutarnje jedinice (dB)</td>
            <td class="container">{{ $klimaUredaj->razina_buke_hladenje_uj }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->dimenzije_vanjske_jedinice_v_s_d))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Dimenzije vanjske jedinice (VxŠxD)</td>
            <td class="container">{{ $klimaUredaj->dimenzije_vanjske_jedinice_v_s_d }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->dimenzije_unutarnje_jedinice_v_s_d))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Dimenzije unutarnje jedinice (VxŠxD)</td>
            <td class="container">{{ $klimaUredaj->dimenzije_unutarnje_jedinice_v_s_d }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->radna_tvar))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Radna tvar</td>
            <td class="container">{{ $klimaUredaj->radna_tvar }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->raspon_ucinka_hladenja_kw))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Raspon učinka hlađenja (kW)</td>
            <td class="container">{{ $klimaUredaj->raspon_ucinka_hladenja_kw }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->raspon_ucinka_grijanja_kw))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">Raspon učinka grijanja (kW)</td>
            <td class="container">{{ $klimaUredaj->raspon_ucinka_grijanja_kw }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->seer))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">SEER</td>
            <td class="container">{{ $klimaUredaj->seer }}</td>
        </tr>
        @endif
        @if (isset($klimaUredaj->scop))
        <tr class="border-dotted border-b-2 border-sky-500 flex justify-between">
            <th class="container text-start">SCOP</td>
            <td class="container">{{ $klimaUredaj->scop }}</td>
        </tr>
        @endif
    </tbody>
</table>