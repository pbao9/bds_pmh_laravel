<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Admin\AdminTransferCustomerRequest;
use App\Admin\Services\Admin\AdminServiceInterface;
use App\Responses\ResponseInterface;

class AdminMoveCustomerController extends Controller
{
    public function __construct(
        AdminServiceInterface $service
    ){
        parent::__construct();
        $this->service = $service;        
    }

    public function store(AdminTransferCustomerRequest $request){

        $this->instance = $this->service->moveCustomer($request);
 
        return $this->response->backCheckBoolean(true);
        
    }

    
}