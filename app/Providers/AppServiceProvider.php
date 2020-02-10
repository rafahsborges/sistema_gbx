<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

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
        setlocale(LC_TIME, 'pt-br');
        Carbon::setLocale('pt_BR');
        date_default_timezone_set('America/Sao_Paulo');
        if (date('I')) {
            date_default_timezone_set('America/Fortaleza');
        }
    }
}
