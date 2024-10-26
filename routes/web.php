<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('redirect', [HomeController::class, 'redirect'])->middleware(['auth', 'verified']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);

Route::get('/view_product', [AdminController::class, 'view_product']);


Route::get('/show_products', [AdminController::class, 'show_products']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);

Route::put('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');

Route::get('product_details/{id}' , [HomeController::class , 'product_details'])->name('product_details');

Route::post('/add_toCart/{id}' , [HomeController::class , 'add_toCart'])->name('add_to-cart');

Route::get('/cart' , [HomeController::class , 'cart'])->name('cart');

Route::get('/user_orders', [HomeController::class, 'user_orders'])->name('user_orders');

Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('cancel_order');

Route::get('/remove_cart/{id}', [HomeController::class, 'delete_cart']);

Route::get('/cashOnDelivery', [HomeController::class, 'cashOnDelivery'])->name('cashOnDelivery');

Route::get('/stripe/{totalPrice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalPrice}', [HomeController::class , 'stripePost'])->name('stripe.post');

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/view_order', [AdminController::class, 'view_order'])->name('view_order');

Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');

Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

Route::get('/send_email/{id}', [AdminController::class, 'send_email']);

Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);

Route::get('/search-orders', [AdminController::class, 'search'])->name('orders.search');

Route::get('/products', [HomeController::class, 'search_products'])->name('products.search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/redirect', [HomeController::class, 'redirect'])->name('dashboard');
});

