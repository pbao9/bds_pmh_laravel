<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Admin\AdminRequest;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Services\Admin\AdminServiceInterface;
use App\Traits\Config;
use App\Admin\DataTables\Admin\AdminDataTable;

class AdminController extends Controller
{
    use Config;
    public function __construct(
        AdminRepositoryInterface $repository, 
        AdminServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.admin.index',
            'create' => 'admin.admin.create',
            'edit' => 'admin.admin.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.admin.index',
            'create' => 'admin.admin.create',
            'edit' => 'admin.admin.edit',
            'delete' => 'admin.admin.delete'
        ];
    }
    public function index(AdminDataTable $dataTable){

        // $admins = $this->repository->paginate();
        // return $this->response->view($this->view['index'], [ 'admins' => $admins]);
        return $dataTable->render($this->view['index']);

    }

    public function create(){
        
        return $this->response->view(
            $this->view['create'], 
            [ 'role' => $this->traitGetRoleAdmin()] // call to function trait config
        );

    }

    public function store(AdminRequest $request){

        $this->instance = $this->service->store($request);

        return $this->response->routeId($this->route['edit'], $this->instance->id);

    }

    public function edit($id){
        
        $this->instance = $this->repository->find($id);
        $loginLog = $this->repository->getLoginLog($this->instance);

        return $this->response->viewRequired(
            $this->view['edit'], 
            [
                'admin' => $this->instance, 
                'loginLog' => $loginLog, 
                'role' => $this->traitGetRoleAdmin() // call to function trait config
            ], 
            ['admin']
        );

    }

    public function update(AdminRequest $request){

        $this->instance = $this->service->update($request);

        return $this->response->backCheckBoolean($this->instance);

    }

    public function destroy($id){

        $this->boolean = $this->service->destroy($id);
        
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
        
    }
}