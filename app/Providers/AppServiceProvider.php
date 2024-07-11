<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
    public function boot()
    {
        View::composer('propios.*', function ($view) {
            // Se necessário, você pode passar dados para o componente aqui
        });
    
        View::composer('components.proprios.*', function ($view) {
            // Se necessário, você pode passar dados para o componente aqui
        });
    }
}
