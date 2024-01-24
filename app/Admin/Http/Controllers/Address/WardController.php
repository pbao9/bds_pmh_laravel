<?php

namespace App\Admin\Http\Controllers\Address;

use App\Http\Controllers\BaseSearchController;
use Illuminate\Http\Request;
use App\Repositories\Ward\WardRepositoryInterface;
use App\Admin\Http\Resources\Address\WardResource;

class WardController extends BaseSearchController
{

    public function __construct(
        WardRepositoryInterface $repository
    ){

        $this->repository = $repository;
                
    }

    protected function data(){
        $this->instance = $this->repository->searchWithDistrictLimit($this->request->input('district_code', ''));
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => WardResource::collection($this->instance)
        ];
    }

}