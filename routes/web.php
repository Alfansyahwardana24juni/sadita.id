<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DetailCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LocaleController;


Route::get('/locale/{lang}', [LocaleController::class, 'setLocale'])->name('locale.set');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/tentang', [TentangController::class, 'tampiltentang'])->name('tentang');
// tampil semua kategori
Route::get('/produk', [ProdukController::class, 'tampilproduk'])->name('produk');
Route::get('/produk/{categorySlug}/{productSlug}', [ProdukController::class, 'show'])->name('product.show');

Route::get('/category/{slug}', [DetailCategoryController::class, 'show'])->name('category.detail');

// Route artikel duluan
Route::get('/artikel', [ArtikelController::class, 'tampilartikel'])->name('artikel');
Route::get('/news/{slug}', [ArtikelController::class, 'showNews'])->name('news.show');
Route::get('/tips/{slug}', [ArtikelController::class, 'showTips'])->name('tips.show');

// Baru route produk dinamis di bawah atau beri prefix
Route::get('/{categorySlug}/{productSlug}', [ProdukController::class, 'show'])->name('product.detail');

// Chat routes
Route::get('/chat', [ChatController::class, 'tampilchat'])->name('chat');
Route::get('/chat/redirect/{type}/{id}', [ChatController::class, 'redirectToWhatsApp'])->name('chat.redirect');