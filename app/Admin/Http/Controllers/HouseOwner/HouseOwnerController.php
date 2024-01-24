<?php

namespace App\Admin\Http\Controllers\HouseOwner;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\HouseOwner\HouseOwnerRequest;
use App\Repositories\HouseOwner\HouseOwnerRepositoryInterface;
use App\Admin\Services\HouseOwner\HouseOwnerServiceInterface;
use App\Admin\DataTables\HouseOwnerDataTable;
use App\Traits\Config;

class HouseOwnerController extends Controller
{
    use Config; //traitGetHouseOwnerPurpose
    public function __construct(
        HouseOwnerRepositoryInterface $repository, 
        HouseOwnerServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
        
    }

    public function getView(){
        return [
            'index' => 'admin.houseowner.index',
            'create' => 'admin.houseowner.create',
            'edit' => 'admin.houseowner.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.houseowner.index',
            'create' => 'admin.houseowner.create',
            'edit' => 'admin.houseowner.edit',
            'delete' => 'admin.houseowner.delete'
        ];
    }
    public function index(HouseOwnerDataTable $dataTable){

        return $dataTable->render($this->view['index']);

    }

    public function create(){
        
        return $this->response->view(
            $this->view['create'],
            ['purpose' => $this->traitGetHouseOwnerPurpose()]
        );

    }
    public function edit($id){
        
        $this->instance = $this->repository->findWithRelations($id);
        return $this->response->viewRequired(
            $this->view['edit'], 
            [
                'house_owner' => $this->instance,
                'purpose' => $this->traitGetHouseOwnerPurpose()
            ], 
            ['house_owner']
        );

    }

    public function store(HouseOwnerRequest $request){

        $this->instance = $this->service->store($request);

        return $this->response->routeId($this->route['edit'], $this->instance->id);

    }

    public function update(HouseOwnerRequest $request){

        $this->instance = $this->service->update($request);

        return $this->response->backCheckBoolean($this->instance);

    }

    public function destroy($id){

        $this->boolean = $this->service->destroy($id);
        
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
        
    }
}