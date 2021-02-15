<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SiteController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('faqs', [SiteController::class, 'faqs']);
Route::get('/', [SiteController::class, 'homepage']);
Route::get('about', [SiteController::class, 'about']);
Route::get('terms', [SiteController::class, 'terms']);
Route::get('privacy', [SiteController::class, 'privacy']);
Route::get('products', [SiteController::class, 'products'])->name('product.list');
Route::get('product/{product}', [SiteController::class, 'product'])->name('product.view');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/store', [CartController::class, 'store'])->name('store');
    Route::get('/thankyou/{id}', [CartController::class, 'thankyou'])->name('thankyou');
    Route::post('/action/{process?}', [CartController::class, 'processCart'])->name('process');
});

Route::get('contact', [SiteController::class, 'contact']);
Route::post('send-contact', [EnquiryController::class, 'store']);

Route::get('redirects', [AdminController::class, 'redirectAfterLogin']);

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dash'])
            ->name('dashboard');
    });

Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'adminDash'])
            ->name('admin.dashboard');
        Route::get('/enquiries', [EnquiryController::class, 'index'])
            ->name('admin.enquiry.index');
        Route::resources([
            'faqs' => FaqController::class,
            'products' => ProductController::class,
            'resources' => ResourceController::class,
            'categories' => CategoryController::class,
        ]);
    });


Route::post('/resource/{id}/save_alt', [ResourceController::class, 'save_alt']);
Route::post('/slim_upload_image', [ResourceController::class, 'slim_upload_image']);
Route::post('/delete_temp_image', [ResourceController::class, 'delete_temp_image']);
Route::post('/upload_dropzone_file', [ResourceController::class, 'upload_dropzone_file']);
Route::delete('/delete_image/{id?}', [ResourceController::class, 'delete_image'])->name('delete_image');
Route::get('/load_uploaded_files/{resourceable_id?}/{resourceable_type?}', [ResourceController::class, 'load_uploaded_files']);

require __DIR__ . '/auth.php';
