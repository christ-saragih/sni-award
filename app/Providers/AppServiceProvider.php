<?php

namespace App\Providers;

use App\Models\Frontpage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

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
        
        Validator::extend('strong_password', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[A-Z]/', $value) &&
                preg_match('/[a-z]/', $value) &&
                preg_match('/[0-9]/', $value) && 
                preg_match('/[^A-Za-z0-9]/', $value);
        });

        Validator::replacer('strong_password', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attribute harus memiliki setidaknya satu huruf kapital, satu huruf kecil, satu angka, dan satu karakter spesial!');
        });
    }
}
