<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    protected $responses = [
        'App\Responses\ResponseInterface' => 'App\Responses\Response'
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->responses as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        JsonResource::withoutWrapping();
        Paginator::useBootstrap();
        Schema::defaultStringLength(191); 
    }
}
