<div>
    <h2 class="text-3xl font-bold mb-6 text-sky-500 border-b-2 border-orange-500 pb-2">Klima uređaji najeftiniji iz ponude</h2>
    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <x-klimaUredaj-card :klimaUredaj="$product" />
        @endforeach
    </div>
</div>
