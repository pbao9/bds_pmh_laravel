<?php

namespace App\Admin\Http\Controllers\Address;

use App\Http\Controllers\BaseSearchController;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Admin\Http\Resources\Address\DistrictResource;

class DistrictController extends BaseSearchController
{

    public function __construct(
        DistrictRepositoryInterface $repository
    ){

        $this->repository = $repository;
                
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => DistrictResource::collection($this->instance)
        ];
    }
}