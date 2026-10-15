{{-- Logo section --}}
<section id="logo-section" class="logo z-30 container bg-white mx-auto px-6 flex justify-between items-center mb-4">
    <a href="/"><img class="w-24 md:w-32" src="{{asset('images/logo.gif')}}" alt="Naslovnica" /></a>

    {{-- @include('partials._search')  --}}

    {{-- Shoping cart --}}
    <livewire:mini-cart />

    
</section>
<hr class="my-2">