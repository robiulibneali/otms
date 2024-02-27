<?php

namespace App\Providers;

use App\Models\Admin\BlogModule\BlogCategory;
use App\Models\Admin\CoursesModule\CourseCategory;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('front.includes.header', function ($view){
            $view->with([
                'courseCategories'  => CourseCategory::where('status', 1)->get(),
                'blogCategories'    => BlogCategory::where('status', 1)->get(),
            ]);
        });
        View::composer('admin.includes.header', function ($view){
            $view->with([
                'users'  => User::all(),
            ]);
        });
    }
}
