<nav class="container mx-auto px-4 flex justify-between items-center">
    {{-- Hamburger button --}}
    <button type="button"
        class="relative py-5 px-6 w-8 h-8 inline-block lg:hidden bg-sky-600 rounded focus:outline-none"
        id="hamburger">
        <span class="absolute left-[50%] translate-x-[-50%] top-[25%] translate-y-[-50%] block w-6 h-0.5 rounded bg-white"></span>
        <span class="absolute left-[50%] translate-x-[-50%] top-[50%] translate-y-[-50%] block w-6 h-0.5 rounded bg-white"></span>
        <span class="absolute left-[50%] translate-x-[-50%] top-[75%] translate-y-[-50%] block w-6 h-0.5 rounded bg-white"></span>
    </button>

    {{-- Top navbar --}}
    <div class="text-gray-700 font-bold hidden lg:inline-block shrink-0">
        <ul class="flex">
            <li><a href="/" class="p-4 {{ request()->is('/') ? 'text-indigo-700  border-b-4 rounded-b border-indigo-700' : 'hover:text-indigo-700 transition duration-150' }}">Naslovnica</a></li>
            <li><a href="/kontakt" class="p-4 ml-[-1rem] {{ request()->is('kontakt') ? 'text-indigo-700  border-b-4 rounded-b border-indigo-700' : 'hover:text-indigo-700 transition duration-150' }}">Kontakt</a></li>
            <li><a href="#" class="p-4 ml-[-1rem] {{ request()->is('o-nama') ? 'text-indigo-700  border-b-4 rounded-b border-indigo-700' : 'hover:text-indigo-700 transition duration-150' }}">O Nama</a></li>
            <li><a href="#" class="p-4 ml-[-1rem] {{ request()->is('blog') ? 'text-indigo-700  border-b-4 rounded-b border-indigo-700' : 'hover:text-indigo-700 transition duration-150' }}">Novosti</a></li>
            <li><a href="#" class="p-4 ml-[-1rem] {{ request()->is('cesta-pitanja') ? 'text-indigo-700  border-b-4 rounded-b border-indigo-700' : 'hover:text-indigo-700 transition duration-150' }}">Česta Pitanja</a></li>
        </ul>  
    </div>

    {{--Contact info (Generički podaci)--}}
    <address class="grid xl:grid-cols-2 text-sky-700">
            <span class="font-semibold hidden sm:inline">
                <i class="mr-2 text-2xl sm:text-xl fa-regular fa-clock"></i>
                <span>Pon - Pet 8:00 - 16:00</span>
            </span>
            <a href="mailto:info@klimewebshop.test" class="mb-2 sm:mb-0 font-semibold underline group">
                <i class="mr-2 text-2xl sm:text-xl fa-regular fa-envelope group-hover:scale-125 transition duration-150"></i>
                <span class="hidden sm:inline">info@klimewebshop.test</span>
            </a>
            <a href="tel:+38512345678" class="mb-2 sm:mb-0 font-semibold underline group">
                <i class="mr-2 text-2xl sm:text-xl fa-solid fa-phone group-hover:scale-125 transition duration-150"></i>
                <span class="hidden sm:inline">+385 1 234 5678</span>
            </a>
            <a href="https://facebook.com" target="_blank" class="font-semibold underline group">
                <i class="mr-2 text-2xl sm:text-xl fa-brands fa-facebook group-hover:scale-125 transition duration-150"></i>
                <span class="hidden sm:inline">Posjetite našu Facebook stranicu</span>
            </a>
    </address>
</nav>
<hr class="my-2">