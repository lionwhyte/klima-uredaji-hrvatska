# Klima Uređaji Hrvatska - Laravel E-Commerce Platforma

Funkcionalna webshop aplikacija izgrađena korištenjem **Laravel**, **Livewire** i **Tailwind CSS** tehnologija, refaktorirana i optimizirana s fokusom na profesionalne arhitektonske prakse, reaktivne košarice i čist kod.

---

## 🚀 Ključne Značajke

* **Interaktivni Katalog i Filteri:** Dinamički katalog proizvoda s naprednim filtriranjem u stvarnom vremenu (raspon cijena, brendovi, rashladni učinak, energetski razredi, oznake za akcije i best-buy ponude).
* **Reaktivna Košarica (Livewire):** Besprijekorno iskustvo kupovine s mini-košaricom, automatskim ažuriranjem količina i izračunima temeljenim na višekratno iskoristivim traitovima (`Traits`).
* **Sloj Narudžbi i Servisi (`OrderService`):** Izdvojena poslovna logika narudžbi koja upravlja transakcijama baze podataka, zbrojevima i slanjem e-mail obavijesti.
* **Sustav E-mail Obavijesti:** Automatsko slanje HTML potvrda kupcima i administratorima prilikom kreiranja narudžbi i slanja upita putem kontakt forme.
* **Promocije i Odbrojavanje:** Dinamičko odbrojavanje vremena do isteka akcije za snižene proizvode uz pomoć Vanilla JS-a.
* **Responzivan Dizajn:** Potpuno prilagođeno sučelje za mobilne uređaje i desktop, dizajnirano pomoću Tailwind CSS-a.

---

## 🛠️ Tehnološki Stack

* **Okvir (Framework):** Laravel 10 / 11
* **Sučelje / Frontend:** Blade predlošci, Tailwind CSS (kroz Vite), Livewire 3
* **Baza Podataka:** MySQL
* **Arhitektonski uzorci:**
  * **Service Layer:** `OrderService` za izmicanje logike iz kontrolera.
  * **Traits:** `CalculatesCart` za zajedničku logiku izračuna u košarici.
  * **Seeders:** Prilagođeni JSON i baze seedera (`KlimaUredajiSeeder`, `PromoProductsSeeder`) za brzu i pouzdanu inicijalizaciju podataka.

---

## 🔧 Upute za Instalaciju i Pokretanje

Slijedite ove korake kako biste pokrenuli projekt lokalno na svom računalu:

1. Klonirajte repozitorij:
    git clone [https://github.com/lionwhyte/klima-uredaji-hrvatska.git](https://github.com/lionwhyte/klima-uredaji-hrvatska.git)
    cd klima-uredaji-hrvatska

2. Instalirajte PHP i Node ovisnosti:
    composer install
    npm install

3. Konfigurirajte okruženje:
    # Kopirajte .env.example datoteku u .env i generirajte ključ aplikacije
    cp .env.example .env
    php artisan key:generate
    # Uredite podatke za spajanje na bazu podataka u vašoj .env datoteci
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=klima_uredaji_db
    DB_USERNAME=root
    DB_PASSWORD=

4. Pokrenite migracije i napunite bazu podacima:
    # Pokrenite migracije i sve seedere (uključujući proizvode i promo artikle)
    php artisan migrate:fresh --seed

5. Pokrenite poslužitelj:
    # Pokretanje Vite servera za CSS/JS
    npm run dev

    # Pokretanje Laravel servera
    php artisan serve