<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    //
    public function getRoute(){
        return [
            'indexRedirect' => 'admin.dashboard'
        ];
    }

    public function index(){
        return $this->response->redirectRoute($this->route['indexRedirect']);
    }

    public function test(){
        session()->flash('success', 'Test');
        return view('test');
    }
}