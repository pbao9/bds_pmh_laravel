<?php

namespace App\Admin\Http\Controllers\Customer;

use App\Http\Controllers\BaseSearchController;
use Illuminate\Http\Request;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Admin\Http\Resources\Customer\CustomerSelectSearchResource;

class CustomerSearchController extends BaseSearchController
{
    public function __construct(
        CustomerRepositoryInterface $repository
    ){

        $this->repository = $repository;
                
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => CustomerSelectSearchResource::collection($this->instance)
        ];
    }
}