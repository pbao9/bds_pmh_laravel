<?php

namespace App\Admin\Http\Controllers\HouseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HouseOwner\HouseOwnerRepositoryInterface;
use App\Admin\Http\Resources\HouseOwner\HouseOwnerSelectSearchResource;

class HouseOwnerSearchController extends Controller
{
    public function __construct(
        HouseOwnerRepositoryInterface $repository
    ){

        $this->repository = $repository;
                
    }

    public function selectSearch(Request $request){

        $this->instance = $this->repository->searchAllLimit($request->input('term', ''));
        $this->instance = [
            'results' => HouseOwnerSelectSearchResource::collection($this->instance)
        ];
        return $this->instance;

    }
}