<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\AdminController;

use App\Http\Controllers\Admin\CoursesModule\CourseCategoryController;
use App\Http\Controllers\Admin\CoursesModule\CourseController;

use App\Http\Controllers\Admin\BlogModule\BlogCategoryController;
use App\Http\Controllers\Admin\BlogModule\BlogController;

use App\Http\Controllers\Admin\UserModule\UserController;
use App\Http\Controllers\Admin\UserModule\RoleController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->group(function (){

        Route::resources([
            'course-categories' => CourseCategoryController::class,
            'courses'           => CourseController::class,

            'blog-categories'   => BlogCategoryController::class,
            'blogs'             => BlogController::class,

            'users'             => UserController::class,
            'roles'             => RoleController::class,
        ]);
    });
});
