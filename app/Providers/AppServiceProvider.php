<?php

namespace App\Providers;

use App\Models\Frontpage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

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
        // View::composer('layouts.app', function ($view) {
        //     $frontpage_data = Frontpage::get()[0];
        //     $view->with('frontpage_data', $frontpage_data);
        // });
    }
}
