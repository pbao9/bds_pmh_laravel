<?php

namespace App\Admin\Http\Controllers\Land;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Land\LandRequest;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Traits\Config;
use App\Admin\DataTables\Land\LandDataTable;

class LandController extends Controller
{
    use Config;

    public function __construct(
        LandRepositoryInterface $repository, 
        LandServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.land.index',
            'create' => 'admin.land.create',
            'edit' => 'admin.land.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.land.index',
            'create' => 'admin.land.create',
            'edit' => 'admin.land.edit',
            'delete' => 'admin.land.delete'
        ];
    }
    public function index(LandDataTable $dataTable){
        // dd($this->repository->getQueryBuilderSelectWithRelations()->get());
        return $dataTable->render(
            $this->view['index']
        );

    }

    public function create(){
        
        return $this->response->view(
            $this->view['create'], 
            [
                'type' => $this->traitGetLandType(),
                'purpose' => $this->traitGetLandPurpose(),
                'status' => $this->traitGetLandStatus(),
                'furniture' => $this->traitGetLandFurniture(),
                'door_direction' => $this->traitGetLandDoorDirection(),
                'currency' => $this->traitGetLandcurrency(),
            ] // call to function trait config
        );

    }
    public function edit($id){

        $this->instance = $this->repository->findWithRelations($id);
        return $this->response->viewRequired(
            $this->view['edit'], 
            [
                'land' => $this->instance,
                'type' => $this->traitGetLandType(),
                'purpose' => $this->traitGetLandPurpose(),
                'status' => $this->traitGetLandStatus(),
                'furniture' => $this->traitGetLandFurniture(),
                'door_direction' => $this->traitGetLandDoorDirection(),
                'currency' => $this->traitGetLandcurrency(),
            ], 
            ['land']
        );

    }

    public function store(LandRequest $request){

        $this->instance = $this->service->store($request);
        
        return $this->response->routeId($this->route['edit'], $this->instance->id);

    }

    public function update(LandRequest $request){

        $this->instance = $this->service->update($request);

        return $this->response->backCheckBoolean($this->instance);

    }

    public function destroy($id){

        $this->boolean = $this->service->destroy($id);
        
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
        
    }
}