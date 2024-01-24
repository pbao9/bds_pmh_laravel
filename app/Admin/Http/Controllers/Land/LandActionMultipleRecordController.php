<?php

namespace App\Admin\Http\Controllers\Land;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Land\LandActionMultipleRecordRequest;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Admin\DataTables\Land\LandRecycleBinDataTable;

class LandActionMultipleRecordController extends Controller
{

    public function __construct(
        LandRepositoryInterface $repository, 
        LandServiceInterface $service
    ){
        parent::__construct();
        
        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function action(LandActionMultipleRecordRequest $request){

        $this->instance = $this->service->actionMultipleRecode($request);

        return $this->response->backCheckBoolean($this->instance);

    }
}