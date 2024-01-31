<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;

Route::get('/', [Controller::class, 'dashboard'])->name('dashboard');

Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::registerView(function () {
    return view('auth.register');
});

Fortify::requestPasswordResetLinkView(function () {
    return view('auth.forgot-password');
});

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware(['guest'])->name('password.request');

Route::post('/forgot-password', function () {
})->middleware(['guest'])->name('password.email');

Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/payment', [OrderController::class, 'payment'])->name('orders.payment');
   
    
    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');


    Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
    

    Route::get('/collection', [ProductController::class, 'index'])->name('product.collection');

    Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('order.history');
});

Route::post('/save-product', [ProductController::class, 'saveProduct']);

Route::post('/place-order/{product}', [Controller::class, 'placeOrder'])->name('place.order');
