<?php

namespace App\Providers;

use App\Models\Frontpage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        // View::composer('layouts.app', function ($view) {
        //     $frontpage_data = Frontpage::get()[0];
        //     $view->with('frontpage_data', $frontpage_data);
        // });
    }
}
