<section>
    <h2 class="text-3xl font-bold text-gray-800 mb-8">PRONAĐI SVOJ KLIMA UREĐAJ</h2>
    <form action="{{ route('searchProducts') }}" method="GET" id="product_search_form" name="Tražilica proizvoda" class="text-gray-700 space-y-4 mb-8">
        <div>
            <h4 class="font-bold">
                KLIMA UREĐAJI – BRENDOVI - klikni na prazno polje </h4>
            <div>
                <select name="brend"
                    class="py-2 w-full border-2 border-sky-500 focus:border-sky-700 rounded outline-none"
                    id="brend-opcije">
                    <option value=""></option>
                    <option value="Azuri">Azuri</option>
                    <option value="Daikin">Daikin</option>
                    <option value="Fujitsu">Fujitsu</option>
                    <option value="Gree">Gree</option>
                    <option value="Haier">Haier</option>
                    <option value="Hitachi">Hitachi</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Korel">Korel</option>
                    <option value="LG">LG</option>
                    <option value="Maxon">Maxon</option>
                    <option value="Midea">Midea</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Qzen">Qzen</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Toshiba">Toshiba</option>
                    <option value="Vivax">Vivax</option>
                    <option value="Vox">Vox</option>
                    <option value="Tesla">Tesla</option>
                </select>
            </div>
        </div>
        <div>
            <h4 class="font-bold">
                KLIMA UREĐAJI PO SNAZI (kw) - klikni na prazno polje </h4>
            <div>
                <select name="snaga"
                    class="py-2 w-full border-2 border-sky-500 focus:border-sky-700 rounded outline-none"
                    id="snaga-opcije">
                    <option value=""></option>
                    <option value="2.5">od 2,5 kw (za prostore od 7 – 25 m2)</option>
                    <option value="3.5">od 3,5 kw (za prostore od 25 – 40 m2)</option>
                    <option value="5.0">od 5 kw (za prostore od 40 – 60 m2)</option>
                    <option value="7.0">od 7 kw (za prostore od 60 – 90 m2)</option>
                </select>
            </div>
        </div>
        <div>
            <h4 class="font-bold">
                KLIMA UREĐAJI ZA VELIČINU PROSTORA (m2) - klikni na prazno polje</h4>
            <div>
                <select name="prostor"
                    class="py-2 w-full border-2 border-sky-500 focus:border-sky-700 rounded outline-none"
                    id="prostor-opcije">
                    <option value=""></option>
                    <option value="25">od 7 – 25 m2 (klima uređaji 2,5 kw)</option>
                    <option value="45">od 25 – 40 m2 (klima uređaji 3,5 kw)</option>
                    <option value="65">od 40 – 60 m2 (klima uređaji 5 kw)</option>
                    <option value="75">od 60 – 90 m2 (klima uređaji 7 kw)</option>
                </select>
            </div>
        </div>
        <div>
            <h4 class="font-bold">
                ENERGETSKA UČINKOVITOST - klikni na prazno polje</h4>
            <div>
                <select name="energetska-klasa"
                    class="py-2 w-full border-2 border-sky-500 focus:border-sky-700 rounded outline-none"
                    id="energetska-klasa-opcije">
                    <option value=""></option>
                    <option value="A">A</option>
                    <option value="A++">A++</option>
                    <option value="A+++">A+++</option>
                </select>
            </div>
        </div>
        <div>
            <h4 class="font-bold">CIJENA</h4>
            <div>
                <div>
                    <input type="radio" value="200-530" id="cijena-0" name="cijena">
                    <label for="cijena-0">Niska
                        cijena (do 3.999,99
                        kn - 530,89
                        €)
                    </label>
                </div>
                <div>
                    <input type="radio" value="530-850" id="cijena-1" name="cijena">
                    <label for="cijena-1">Srednja cijena (od 4.000,00 kn - 530,89 € do
                        6.399,99
                        kn - 849,42 €)
                    </label>
                </div>
                <div><input type="radio" value="850-2000" id="cijena-2" name="cijena">
                    <label for="cijena-2">Visoka cijena
                        (iznad 6.400,00 kn - 849,42 €)
                    </label>
                </div>
                <div>
                    <input
                        type="radio" value="" id="cijena-3" name="cijena"
                        checked="checked">
                    <label for="cijena-3">Cijena nije bitna</label>
                </div>
            </div>
        </div>
        <button type="submit" class="bg-indigo-500 py-2 px-6 hover:bg-indigo-700 transition duration-150 text-white font-bold rounded">POTRAŽI</button>
    </form>
</section>