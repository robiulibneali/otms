<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\OTMSController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\Payment\PaymentController;

Route::name('front.')->group(function (){
    Route::get('/', [OTMSController::class, 'home'])->name('home');
    Route::get('/faq', [OTMSController::class, 'faq'])->name('faq');
    Route::get('/about', [OTMSController::class, 'about'])->name('about');
    Route::get('/contact', [OTMSController::class, 'contact'])->name('contact');

    Route::get('/course-category/{category_id}/{name?}', [OTMSController::class, 'courseCategory'])->name('course-category');
    Route::get('/courses-details/{course_id}/{title?}', [OTMSController::class, 'coursesDetails'])->name('course-details');

    Route::get('/blog-category/{category_id}/{title?}', [OTMSController::class, 'blogCategory'])->name('blog-category');
    Route::get('/blog-details/{blog_id}/{title?}', [OTMSController::class, 'blogDetails'])->name('blog-details');

    Route::get('/show-cart-items', [CartController::class, 'showCartItems'])->name('show-cart-items');
    Route::post('/add-to-cart/{course_id}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/delete-cart-item/{item_id}', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');
    Route::post('/update-cart-item/{item_id}', [CartController::class, 'updateCartItem'])->name('update-cart-item');

    Route::get( '/order-checkout', [PaymentController::class, 'checkout'])->name('order-checkout');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('sslcommerz/success',[PaymentController::class, 'success'])->name('payment.success');
    Route::post('sslcommerz/failure',[PaymentController::class, 'failure'])->name('payment.failure');
    Route::post('sslcommerz/cancel',[PaymentController::class, 'cancel'])->name('payment.cancel');
    Route::post('sslcommerz/ipn',[PaymentController::class, 'ipn'])->name('payment.ipn');
});
