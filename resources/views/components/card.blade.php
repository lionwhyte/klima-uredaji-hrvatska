<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6 container mx-auto'])}}> {{-- $attributes->merge omogucuje povezivanje klasa ovdje u zagradama navedenih sa klasama navedenim u x-card elementu--}}
    {{$slot}} {{-- koji god zadržaj dođe unutar slota biti će child ovom gornjem divu--}}
</div>