<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseSearchController extends Controller
{

    protected $request;

    public function selectSearch(Request $request){

        $this->request = $request;

        $this->data();
        
        $this->selectResponse();

        return $this->instance;

    }

    protected function data(){
        $this->instance = $this->repository->searchAllLimit($this->request->input('term', ''));
    }

    protected function selectResponse(){
        $this->instance = [ 'results' => $this->instance];
    }

}
