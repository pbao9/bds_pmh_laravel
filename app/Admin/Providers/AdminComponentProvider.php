<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AdminComponentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::component('alert', \App\Admin\View\Components\Partials\Alert::class);
        Blade::component('admin-sidebar', \App\Admin\View\Components\Partials\Sidebar::class);
        Blade::component('menu-home', \App\Admin\View\Components\Partials\MenuHome::class);
        Blade::component('menu-home-mobi', \App\Admin\View\Components\Partials\MenuHomeMobi::class);
    }
}