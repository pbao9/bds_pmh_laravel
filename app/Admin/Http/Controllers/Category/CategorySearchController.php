<?php

namespace App\Admin\Http\Controllers\Category;

use App\Http\Controllers\BaseSearchController;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Http\Resources\Category\CategorySelectSearchResource;

class CategorySearchController extends BaseSearchController
{
    public function __construct(
        CategoryRepositoryInterface $repository
    ){

        $this->repository = $repository;
                
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => CategorySelectSearchResource::collection($this->instance)
        ];
    }
}