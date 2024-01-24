<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Admin\Services\Admin\AdminServiceInterface;
use \Auth;
use App\Admin\Http\Requests\Auth\ProfileRequest;

class ProfileController extends Controller
{
    //
    public function __construct(
        AdminServiceInterface $service
    ){

        parent::__construct();

        $this->service = $service;
    }
    
    public function getView(){
        return [
            'index' => 'admin.auth.profile.index'
        ];
    }

    public function index(){

        $auth = Auth::guard('admin')->user();

        return $this->response->viewRequired(
            $this->view['index'], 
            ['auth' => $auth], 
            ['auth']
        );

    }

    public function update(ProfileRequest $request){
        $this->instance = $this->service->update($request);
        return $this->response->backCheckBoolean($this->instance);
    }
}