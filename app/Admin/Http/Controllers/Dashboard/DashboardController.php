<?php

namespace App\Admin\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function getView(){
        return [
            'index' => 'admin.dashboard.index'
        ];
    }

    public function index(){
        return $this->response->view($this->view['index']);
    }
}