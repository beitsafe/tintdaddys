<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EnquiryController;

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

Route::get('/', [SiteController::class, 'homepage'])->name('homepage');
Route::get('about', [SiteController::class, 'about']);
Route::get('faqs', [SiteController::class, 'faqs']);
Route::get('privacy', [SiteController::class, 'privacy']);
Route::get('terms', [SiteController::class, 'terms']);
Route::get('product', [SiteController::class, 'product']);


Route::get('contact', [SiteController::class, 'contact'])->name('contact');
Route::post('send-contact', [EnquiryController::class, 'store']);


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
