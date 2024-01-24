<?php

namespace App\Admin\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Customer\CustomerRequest;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Admin\Services\Customer\CustomerServiceInterface;
use App\Traits\Config;
use App\Admin\DataTables\Customer\CustomerDataTable;

class CustomerController extends Controller
{
    use Config;

    public function __construct(
        CustomerRepositoryInterface $repository, 
        CustomerServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.customer.index',
            'create' => 'admin.customer.create',
            'edit' => 'admin.customer.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.customer.index',
            'create' => 'admin.customer.create',
            'edit' => 'admin.customer.edit',
            'delete' => 'admin.customer.delete'
        ];
    }
    public function index(CustomerDataTable $dataTable){

        return $dataTable->render($this->view['index']);

    }

    public function create(){
        
        return $this->response->view(
            $this->view['create'] // call to function trait config
        );

    }
    public function edit($id){

        $this->instance = $this->repository->find($id);

        return $this->response->viewRequired(
            $this->view['edit'], 
            [
                'customer' => $this->instance
            ], 
            ['customer']
        );

    }

    public function store(CustomerRequest $request){

        $this->instance = $this->service->store($request);

        return $this->response->routeId($this->route['edit'], $this->instance->id);

    }

    public function update(CustomerRequest $request){

        $this->instance = $this->service->update($request);

        return $this->response->backCheckBoolean($this->instance);

    }

    public function destroy($id){

        $this->boolean = $this->service->destroy($id);
        
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
        
    }
}