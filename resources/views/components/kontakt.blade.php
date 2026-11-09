<section class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 space-x-0 lg:space-x-4 justify-between items-start px-6 py-20 bg-gray-100 text-slate-800">
    <section class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow-sm border border-gray-200">

        @if (request()->is('kontakt'))
        <h2 class="mb-3 text-2xl font-bold text-slate-800">Pošaljite nam upit</h2>
        <p class="mb-6 text-gray-600 text-sm">Molimo Vas da ispunite kontakt obrazac. Kontaktirat ćemo vas u najkraćem mogućem roku.</p>
        @else
        <h2 class="mb-3 text-2xl font-bold text-slate-800">Upišite kontakt u sljedeću formu</h2>
        <p class="mb-6 text-gray-600 text-sm">Pošaljite nam upit za odabrane klima uređaje, a naš tim će vam pripremiti ponudu s najboljim uvjetima, popustima i opcijama ovlaštene montaže diljem Hrvatske.</p>
        @endif
        
        @include('partials._kontakt-forma')
    </section>

    <section class="w-full lg:w-1/2 space-y-6 py-2">
        <div class="space-y-3">
            <h2 class="text-3xl font-bold text-slate-800">Budite slobodni kontaktirati nas.</h2>
            <p class="text-gray-600 leading-relaxed text-sm">
                Specijalizirani smo centar za klimatizaciju s dugogodišnjim iskustvom u prodaji, stručnom savjetovanju, ugradnji i servisu klima uređaja. Kroz našu mrežu ovlaštenih timova pokrivamo područje cijele Hrvatske, uključujući otoke.
            </p>
            <p class="text-gray-600 leading-relaxed text-sm">
                Naši terenski instalateri nalaze se u blizini vaših lokacija, što omogućuje brzu reakciju, izlazak na teren i kvalitetnu izvedbu montaže prilagođenu vašem prostoru.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 space-y-3">
            <address class="not-italic space-y-2">
                <p class="font-bold text-slate-800">Klima Webshop d.o.o.</p>
                <p class="space-x-2 flex items-center text-gray-600">
                    <i class="fa-solid fa-phone text-sky-600"></i>
                    <a class="text-sky-600 hover:underline font-semibold" href="tel:+38512345678">+385 1 234 5678</a>
                </p>
                <p class="space-x-2 flex items-center text-gray-600">
                    <i class="fa-solid fa-envelope text-red-500"></i>
                    <a class="text-sky-600 hover:underline font-semibold" href="mailto:info@klimatizacija-webshop.test">info@klimatizacija-webshop.test</a>
                </p>
            </address>
        </div>

        <div class="details bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <button class="toggle text-start flex items-center justify-between w-full font-bold text-slate-800" onclick="toggleDetails(this)">
                <span class="flex items-center space-x-2">
                    <span class="toggle-icon text-sky-600">
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus hidden"></i>
                    </span>
                    <span>Područja pokrivenosti i usluge montaže</span>
                </span>
                <span class="text-xs text-sky-600 font-semibold">(prikaži više...)</span>
            </button>
            <div class="content hidden mt-4 text-sm text-gray-600 leading-relaxed">
                Vršimo prodaju, montažu i servis klima uređaja na području gradova: Zagreb, Rijeka, Split, Zadar, Osijek, Slavonski Brod, Pula, Karlovac, Varaždin, Dubrovnik te u svim okolnim mjestima i na otocima u krugu od 150 km.
            </div>
        </div>
        
    </section>
</section>