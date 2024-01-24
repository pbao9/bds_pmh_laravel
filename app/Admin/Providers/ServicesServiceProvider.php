<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    protected $services = [
        'App\Admin\Services\Admin\AdminServiceInterface' => 'App\Admin\Services\Admin\AdminService',
        'App\Admin\Services\Customer\CustomerServiceInterface' => 'App\Admin\Services\Customer\CustomerService',
        'App\Admin\Services\HouseOwner\HouseOwnerServiceInterface' => 'App\Admin\Services\HouseOwner\HouseOwnerService',
        'App\Admin\Services\Category\CategoryServiceInterface' => 'App\Admin\Services\Category\CategoryService',
        'App\Admin\Services\Land\LandServiceInterface' => 'App\Admin\Services\Land\LandService',
        'App\Admin\Services\Post\PostServiceInterface' => 'App\Admin\Services\Post\PostService',
        'App\Admin\Services\Contract\ContractServiceInterface' => 'App\Admin\Services\Contract\ContractService',

    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
