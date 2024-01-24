<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        'App\Repositories\Admin\AdminRepositoryInterface' => 'App\Repositories\Admin\AdminRepository',
        'App\Repositories\Customer\CustomerRepositoryInterface' => 'App\Repositories\Customer\CustomerRepository',
        'App\Repositories\HouseOwner\HouseOwnerRepositoryInterface' => 'App\Repositories\HouseOwner\HouseOwnerRepository',
        'App\Repositories\Category\CategoryRepositoryInterface' => 'App\Repositories\Category\CategoryRepository',
        'App\Repositories\Land\LandRepositoryInterface' => 'App\Repositories\Land\LandRepository',
        'App\Repositories\Post\PostRepositoryInterface' => 'App\Repositories\Post\PostRepository',
        'App\Repositories\District\DistrictRepositoryInterface' => 'App\Repositories\District\DistrictRepository',
        'App\Repositories\Ward\WardRepositoryInterface' => 'App\Repositories\Ward\WardRepository',
        'App\Repositories\Meeting\MeetingRepositoryInterface' => 'App\Repositories\Meeting\MeetingRepository',
        'App\Repositories\Contract\ContractRepositoryInterface' => 'App\Repositories\Contract\ContractRepository',

    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->repositories as $interface => $implement) {
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
