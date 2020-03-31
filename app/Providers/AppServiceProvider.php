<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//importanto o blade para usar o alert de erro como atalho
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //declarando o blade para usar o componente de alert
        Blade::component('components.alert','alert');
    }
}
