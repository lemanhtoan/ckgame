<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Gametype;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.default', function($view)
        {
            $data = Gametype::all();
            $view->with('data', $data);
        });

        view()->composer('layouts.sidebar', function($view)
        {
            $data = Gametype::all();
            $view->with('data', $data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
