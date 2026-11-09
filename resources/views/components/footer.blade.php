<footer class="px-4 py-6 bg-slate-900 opacity-90">
    <div class="flex sm:justify-around flex-wrap space-x-6 text-slate-300">
        <address class="my-4 ml-6 space-y-4">
            <h3 class="text-sky-500 text-lg font-bold">Kontaktirajte nas</h3>
            <div class="mt-4">
                <h4>TELEFON</h4>
                <a href="tel:+38512345678">
                    <span class="text-sky-500 text-2xl mr-1"><i class="fa-solid fa-phone"></i></span>
                    <span class="text-white text-lg">+385 1 234 5678</span>
                </a>
            </div>
            <div>
                <h4>EMAIL</h4>
                <a href="mailto:info@klimewebshop.test">
                    <span class="text-sky-500 text-2xl mr-1"><i class="fa-solid fa-envelope"></i></span>
                    <span class="text-white text-lg">info@klimewebshop.test</span>
                </a>
            </div>
            <div>
                <h4>RADNO VRIJEME</h4>
                <span class="text-white text-lg">Pon. - Pet. / 8:00 - 16:00</span>
            </div>
            <div>
                <a href="https://facebook.com" class="text-sky-500 text-2xl" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            </div>
        </address>
        <div class="my-4">
            <h3 class="text-sky-500 text-lg font-bold">Služba za korisnike</h3>
            <ul class="mt-4 space-y-1">
                <li><a href="/kontakt" class="translate duration-150 hover:text-white">Kontakt</a></li>
                <li><a href="#" class="translate duration-150 hover:text-white">Link 1</a></li>
                <li><a href="#" class="translate duration-150 hover:text-white">Link 2</a></li>
                <li><a href="#" class="translate duration-150 hover:text-white">Link 3</a></li>
            </ul>
        </div>
        <div class="my-4 text-sm">
            <h3 class="text-sky-500 text-lg font-bold">PRIJAVITE SE NA NEWSLETTER</h3>
            <p class="my-4">I saznajte više o ekskluzivnim akcijama te svim detaljima aktualne ponude i trendovima u svijetu klimatizacije.</p>
            @include('partials._kontakt-forma')
        </div>
    </div>
    <div class="container py-4 mx-auto border-t-[1px] flex flex-col lg:flex-row items-center justify-start font-bold text-white md:justify-around">
        <div class="text-sm text-slate-300">Klima Webshop &copy; 2026, All Rights Reserved</div>
        <div class="flex justify-center flex-wrap space-x-2">
            <img class="mt-2 rounded-lg" src="{{asset('images/visa-premium.webp')}}" alt="visa-premium">
            <img class="mt-2 rounded-lg" src="{{asset('images/visa.gif')}}" alt="visa">
            <img class="mt-2 rounded-lg" src="{{asset('images/diners.gif')}}" alt="diners">
            <img class="mt-2 rounded-lg" src="{{asset('images/maestro.gif')}}" alt="maestro">
            <img class="mt-2 rounded-lg" src="{{asset('images/master.gif')}}" alt="master-card">
        </div>
    </div>
</footer>