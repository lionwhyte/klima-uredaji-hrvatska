<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AkcijeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\KlimaUredajController;
use App\Http\Controllers\CookiePolicyController;
use App\Http\Controllers\NajjeftinijeController;

// Cookie consent middleware grupa
Route::group(['middleware' => 'checkCookieConsent'], function () {
    // Eventualne rute koje traže pristanak
});

// Javne stranice (Home, Kontakt, O nama, Česta pitanja) preko čistog Route::view()
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/kontakt', 'kontakt')->name('kontakt');
Route::post('/kontakt', [ContactFormController::class, 'submitForm'])->name('kontakt.submit');

// Webshop rute za klima uređaje
Route::get('/klima-uredaji', [KlimaUredajController::class, 'index'])->name('shop');
Route::get('/klima-uredaji/search', [KlimaUredajController::class, 'search'])->name('searchProducts');
Route::get('/klima-uredaji/{slug}', [KlimaUredajController::class, 'show'])->name('singleProduct');

// Košarica i Checkout proces
Route::get('/kosarica', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'createOrder'])->name('order.create');
Route::get('/checkout/order-received/{order_id}', [CheckoutController::class, 'orderReceived'])->name('order.received');








