<?php

namespace App\Admin\Http\Controllers\Land;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Http\Resources\Land\LandSelectSearchResource;

class LandSearchController extends Controller
{
    public function __construct(
        LandRepositoryInterface $repository
    ){

        $this->repository = $repository;
                
    }

    public function selectSearch(Request $request){
        $this->instance = $this->repository->searchAllLimit($request->input('term', ''));
        $this->instance = [
            'results' => LandSelectSearchResource::collection($this->instance)
        ];
        return $this->instance;
    }
}