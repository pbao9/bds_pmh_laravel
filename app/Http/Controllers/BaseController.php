<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Mảng chứa đường dẫn tới views
     *
     * @var array
     */
    protected $view;
    /**
     * Mảng chứa tên route
     *
     * @var array
     */
    protected $route;

    protected $response;
    /**
     * Current Object instance
     *
     * @var object|array|mixed
     */
    protected $instance;

    public function __construct(){

        $this->setView();

        $this->setRoute();

        $this->response = \App::make('App\Responses\ResponseInterface');
        
    }

    public function getView(){
        return $this->view ?? [];
    }

    public function setView(){
        $this->view = $this->getView();
    }

    public function getRoute(){
        return $this->route ?? [];
    }

    public function setRoute(){
        $this->route = $this->getRoute();
    }
}
