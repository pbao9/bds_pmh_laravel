<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Services\Admin\AdminServiceInterface;
use App\Admin\Http\Requests\Auth\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    //
    public function __construct(
        AdminRepositoryInterface $repository, 
        AdminServiceInterface $service){

        parent::__construct();
        
        $this->repository = $repository;

        $this->service = $service;
    }
    
    public function getView(){
        return [
            'index' => 'admin.auth.password.changepassword'
        ];
    }

    public function index(){

        return $this->response->view($this->view['index']);

    }

    public function update(ChangePasswordRequest $request){

        if($this->service->CheckSamePassword($request->old_password, $request->hash_password)){

            $this->instance = $this->service->update($request);
            return $this->response->backCheckBoolean($this->instance);
        }

        return $this->response->backCheckBoolean(false, null, __('Mật khẩu cũ không đúng'));

    }


}