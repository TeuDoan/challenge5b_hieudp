<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Auth;

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
    public function boot()
{
    Blade::if('isOwner', function ($uuid) {
        return Auth::check() && Auth::user()->uuid === $uuid;
    });

    Blade::if('isTeacher', function () {
        return session('is_teacher') == 1;
    });
}
}
