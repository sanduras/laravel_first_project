<?php

namespace App\Providers;

use Facade\FlareClient\View as FlareClientView;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Language;

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
        View::composer(['dashboardAdmin.dashboardAdmin','dashboardAdmin.master','dashboardAdmin.additem','masterstart','dashboardAdmin.edit','master'], function ($view){
            $view->with('languages', Language::orderBy('title')->get());
        });
    }
}
