<?php

namespace App\Admin\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Category\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Services\Category\CategoryServiceInterface;
use App\Admin\DataTables\Category\CategoryDataTable;
use App\Traits\Config;

class CategoryController extends Controller
{
    use Config;

    public function __construct(
        CategoryRepositoryInterface $repository, 
        CategoryServiceInterface $service
    ){
        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
    }

    public function getView(){
        return [
            'index' => 'admin.category.index',
            'create' => 'admin.category.create',
            'edit' => 'admin.category.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.category.index',
            'create' => 'admin.category.create',
            'edit' => 'admin.category.edit',
            'delete' => 'admin.category.delete'
        ];
    }
    public function index(categoryDataTable $dataTable){

        return $dataTable->render($this->view['index']);

    }

    public function create(){
        
        return $this->response->view(
            $this->view['create'],
            ['status' => $this->traitGetCategoryStatus()]
        );

    }

    public function store(CategoryRequest $request){

        $this->instance = $this->service->store($request);

        return $this->response->routeId($this->route['edit'], $this->instance->id);

    }

    public function edit($id){
        
        $this->instance = $this->repository->find($id);

        return $this->response->viewRequired(
            $this->view['edit'], 
            [
                'category' => $this->instance, 
                'status' => $this->traitGetCategoryStatus()
            ], 
            ['category']
        );

    }

    public function update(CategoryRequest $request){

        $this->instance = $this->service->update($request);

        return $this->response->backCheckBoolean($this->instance);

    }

    public function destroy($id){

        $this->boolean = $this->service->destroy($id);
        
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
        
    }
}