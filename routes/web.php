<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'homepage']);
Route::get('about', [SiteController::class, 'about']);
Route::get('faqs', [SiteController::class, 'faqs']);
Route::get('privacy', [SiteController::class, 'privacy']);
Route::get('terms', [SiteController::class, 'terms']);
Route::get('product', [SiteController::class, 'product']);
Route::get('products', [SiteController::class, 'products']);


Route::get('cart', [SiteController::class, 'cart']);


Route::get('contact', [SiteController::class, 'contact']);
Route::post('send-contact', [EnquiryController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dash'])->name('dashboard');
});

Route::middleware(['is.admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDash'])->name('admin.dashboard');

    Route::resources([
        'faqs' => FaqController::class,
    ]);
});

require __DIR__.'/auth.php';
