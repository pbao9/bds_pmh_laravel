<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentProvider extends ServiceProvider
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
        Blade::component('form', \App\View\Components\Form::class);
        Blade::component('card', \App\View\Components\Card::class);
        Blade::component('input-group', \App\View\Components\inputGroup::class);
        Blade::component('input', \App\View\Components\Input\Input::class);
        Blade::component('input-password', \App\View\Components\Input\inputPassword::class);
        Blade::component('input-email', \App\View\Components\Input\InputEmail::class);
        Blade::component('input-phone', \App\View\Components\Input\InputPhone::class);
        Blade::component('input-datetime', \App\View\Components\Input\InputDatetime::class);
        Blade::component('input-gallery', \App\View\Components\Input\InputGallery::class);
        Blade::component('input-image', \App\View\Components\Input\InputImage::class);
        Blade::component('textarea', \App\View\Components\Input\Textarea::class);
        Blade::component('select', \App\View\Components\Select\Select::class);
        Blade::component('option', \App\View\Components\Select\Option::class);
        Blade::component('input-group', \App\View\Components\inputGroup::class);
    }
}