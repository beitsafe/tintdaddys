<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\InstallerController;
use romanzipp\QueueMonitor\Services\QueueMonitor;

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
        Route::post('/dashboard/warranties', [WarrantyController::class, 'store'])
            ->name('profile.warranties.store');
    });

Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'adminDash'])
            ->name('dashboard');
        Route::get('/enquiries', [EnquiryController::class, 'index'])
            ->name('enquiry.index');
        Route::post('/orders/dispatch', [OrderController::class, 'orderDispatch'])
            ->name('order.dispatch');
        Route::queueMonitor();
        Route::resources([
            'faqs' => FaqController::class,
            'users' => UserController::class,
            'orders' => OrderController::class,
            'products' => ProductController::class,
            'resources' => ResourceController::class,
            'categories' => CategoryController::class,
            'installers' => InstallerController::class,
        ]);
        Route::resource('warranties', WarrantyController::class)
            ->except([
            'store',
        ]);
    });


Route::post('/resource/{id}/save_alt', [ResourceController::class, 'save_alt'])->name('resources.savealt');
Route::post('/slim_upload_image', [ResourceController::class, 'slim_upload_image']);
Route::post('/delete_temp_image', [ResourceController::class, 'delete_temp_image']);
Route::post('/upload_dropzone_file', [ResourceController::class, 'upload_dropzone_file']);
Route::delete('/delete_image/{id?}', [ResourceController::class, 'delete_image'])->name('delete_image');
Route::get('/load_uploaded_files/{resourceable_id?}/{resourceable_type?}', [ResourceController::class, 'load_uploaded_files']);

require __DIR__ . '/auth.php';
