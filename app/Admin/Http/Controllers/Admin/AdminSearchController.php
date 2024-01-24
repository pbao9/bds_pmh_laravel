<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Http\Controllers\BaseSearchController;
use Illuminate\Http\Request;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Http\Resources\Admin\AdminSelectSearchResource;

class AdminSearchController extends BaseSearchController
{
    public function __construct(
        AdminRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => AdminSelectSearchResource::collection($this->instance)
        ];
    }
}