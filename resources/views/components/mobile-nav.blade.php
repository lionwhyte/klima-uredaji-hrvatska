{{-- Mobile nav --}}
<nav class="container mx-auto px-4 lg:hidden h-0 mt-0 mb-4 overflow-hidden" id="mobile-nav">
    <ul class="text-white">
        <li>
            <a href="/klima-uredaji"
                class="block mb-0.5 py-1 px-4 {{ request()->is('klima-uredaji') ? 'bg-sky-700' : 'bg-sky-500 hover:bg-sky-700'}}">KLIMA UREĐAJI SHOP</a>
        </li>
        <li>
            <a href="#"
                class="block mb-0.5 py-1 px-4 bg-sky-500 hover:bg-sky-700">LINK 1</a>
        </li>
        <li>
            <a href="#"
                class="block mb-0.5 py-1 px-4 bg-sky-500 hover:bg-sky-700">LINK 2</a>
        </li>
        <li>
            <a href="#"
                class="block mb-0.5 py-1 px-4 bg-sky-500 hover:bg-sky-700">LINK 3</a>
        </li>
        <li>
            <a href="/"
                class="block mb-0.5 py-1 px-4 {{ request()->is('/') ? 'bg-sky-700' : 'bg-sky-500 hover:bg-sky-700'}}">NASLOVNICA</a>
        </li>
        <li>
            <a href="/kontakt"
                class="block mb-0.5 py-1 px-4 {{ request()->is('kontakt') ? 'bg-sky-700' : 'bg-sky-500 hover:bg-sky-700'}}">KONTAKT</a>
        </li>
        <li>
            <a href="#"
                class="block mb-0.5 py-1 px-4 {{ request()->is('o-nama') ? 'bg-sky-700' : 'bg-sky-500 hover:bg-sky-700'}}">O NAMA</a>
        </li>
        <li>
            <a href="#"
                class="block mb-0.5 py-1 px-4 {{ request()->is('blog') ? 'bg-sky-700' : 'bg-sky-500 hover:bg-sky-700'}}">NOVOSTI</a>
        </li>
        <li>
            <a href="#"
                class="block mb-0.5 py-1 px-4 {{ request()->is('cesta-pitanja') ? 'bg-sky-700' : 'bg-sky-500 hover:bg-sky-700'}}">ČESTA PITANJA</a>
        </li>
    </ul>
</nav>