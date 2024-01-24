<?php

namespace App\Admin\Http\Controllers\Land;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Traits\Config;
use App\Admin\DataTables\Land\LandRecycleBinDataTable;

class LandRecycleBinController extends Controller
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
            'index' => 'admin.land.recyclebin.index'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.land.recyclebin.index'
        ];
    }
    public function index(LandRecycleBinDataTable $dataTable){

        return $dataTable->render(
            $this->view['index']
        );

    }

    public function restore($id){

        $this->instance = $this->service->restore($id);

        return $this->response->backCheckBoolean($this->instance);

    }

    public function delete($id){

        $this->boolean = $this->service->delete($id);
        
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
        
    }
}