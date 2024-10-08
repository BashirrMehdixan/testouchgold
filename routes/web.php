<?php

use App\Http\Controllers\AboutController\AboutController;
use App\Http\Controllers\ContactController\ContactController;
use App\Http\Controllers\GiftCardsController\GiftCardsController;
use App\Http\Controllers\GoldbarController\GoldbarController;
use App\Http\Controllers\HomeController\HomeController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\WeddingOccasionController\WeddingOccasionController;
use App\Http\Middleware\SetLocale;
use App\Models\Language;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

$locale = Request::segment(1);
if (in_array($locale, Language::pluck('slug')->toArray())) {
    $locale = Request::segment(1);
} else {
    $locale = '';
}

Route::group(['prefix' => $locale, function ($locale = null) {
    return $locale;
}, 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => SetLocale::class], function () {
    // Index
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/apply', [ContactController::class, 'store'])->name('contact.send');

    // Products route
    Route::get('products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('products/{slug}', [ProductsController::class, 'show'])->name('products.show');

    Route::get('gift-cards', [GiftCardsController::class, 'index'])->name('gift.index');
    Route::get('gift-cards/{slug}', [GiftCardsController::class, 'show'])->name('gift.show');

    Route::get('wedding-occasions', [WeddingOccasionController::class, 'index'])->name('wedding-occasions.index');
    Route::get('wedding-occasions/{slug}', [WeddingOccasionController::class, 'items'])->name('wedding-occasions.items');
    Route::get('wedding-occasions/products/{slug}', [WeddingOccasionController::class, 'show'])->name('wedding-occasions.show');

    Route::get('goldbar-and-goldcoin', [GoldBarController::class, 'index'])->name('gold.index');
    Route::get('goldbar-and-goldcoin/{slug}', [GoldBarController::class, 'items'])->name('gold.items');
    Route::get('goldbar-and-goldcoin/products/{slug}', [GoldBarController::class, 'show'])->name('gold.show');

    Route::get('collections/{slug}', [ProductsController::class, 'collections'])->name('collections.show');
});
