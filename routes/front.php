<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\OTMSController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\Payment\PaymentController;

Route::name('front.')->group(function (){
    Route::get('/', [OTMSController::class, 'home'])->name('home');
    Route::get('/about', [OTMSController::class, 'about'])->name('about');
    Route::get('/contact', [OTMSController::class, 'contact'])->name('contact');
    Route::get('/faq', [OTMSController::class, 'faq'])->name('faq');

    Route::get('/course-category/{category_id}/{name?}', [OTMSController::class, 'courseCategory'])->name('course-category');
    Route::get('/courses-details/{course_id}/{title?}', [OTMSController::class, 'coursesDetails'])->name('course-details');

    Route::get('/blog-category/{category_id}/{title?}', [OTMSController::class, 'blogCategory'])->name('blog-category');
    Route::get('/blog-details/{blog_id}/{title?}', [OTMSController::class, 'blogDetails'])->name('blog-details');

    Route::post('/add-to-cart/{course_id}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/show-cart-items', [CartController::class, 'showCartItems'])->name('show-cart-items');
    Route::get('/delete-cart-item/{item_id}', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');
    Route::post('/update-cart-item/{item_id}', [CartController::class, 'updateCartItem'])->name('update-cart-item');

    Route::get( '/order-checkout', [PaymentController::class, 'checkout'])->name('order-checkout');
});
