<?php

namespace App\Admin\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Post\PostRequest;
use App\Repositories\Post\PostRepositoryInterface;
use App\Admin\Services\Post\PostServiceInterface;
use App\Traits\Config;
use App\Admin\DataTables\Post\PostDataTable;

class PostController extends Controller
{
    use Config;

    public function __construct(
        PostRepositoryInterface $repository, 
        PostServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.post.index',
            'create' => 'admin.post.create',
            'edit' => 'admin.post.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.post.index',
            'create' => 'admin.post.create',
            'edit' => 'admin.post.edit',
            'delete' => 'admin.post.delete'
        ];
    }
    public function index(PostDataTable $dataTable){
        return $dataTable->render(
            $this->view['index']
        );

    }

    public function create(){
        
        return $this->response->view(
            $this->view['create'], 
            [
                'status' => $this->traitGetPostStatus(),
            ] // call to function trait config
        );

    }
    public function edit($id){

        $this->instance = $this->repository->findWithRelations($id);
        return $this->response->viewRequired(
            $this->view['edit'], 
            [
                'post' => $this->instance,
                'status' => $this->traitGetPostStatus(),
            ], 
            ['post']
        );

    }

    public function store(PostRequest $request){

        $this->instance = $this->service->store($request);
        
        return $this->response->routeId($this->route['edit'], $this->instance->id);

    }

    public function update(PostRequest $request){

        $this->instance = $this->service->update($request);

        return $this->response->backCheckBoolean($this->instance);

    }

    public function destroy($id){

        $this->boolean = $this->service->destroy($id);
        
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
        
    }
}