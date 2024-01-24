<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Responses\ResponseInterface;
use App\Traits\Config;

class StaffController extends Controller
{
    use Config;
    public function __construct(
        LandRepositoryInterface $repository, 
        LandServiceInterface $service,
        ResponseInterface $response 
    ){
        $this->setView();
        $this->repository = $repository;   
        $this->service = $service;
        $this->response = $response;
        $this->select = ['id', 'house_owner_id','admin_id', 'avatar', 'purpose', 'slug', 'door_direction',
        'title', 'price', 'created_at', 'area', 'content', 'district_id'];
    }

    public function getView(){
        return [
            'index' => 'home.products.category.index',
            'indexDistrict' => 'home.products.category.index',
            '401' => 'errors.401',
        ];
    }

    public function index($id) {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations($this->select, 
            // ['house_owner:id,fullname'])->where('house_owner_id', $id)->get();
            ['admin:id,fullname'])->where('admin_id', $id)->get();
            //dd($this->instance->first()->house_owner->fullname);
        return $this->response->viewRequired($this->view['index'], [
            'land' => $this->instance,
            'name_purpose' => null,
            'name_staff' => $this->instance->first()->admin->fullname,
            'name_district' => null,
            'category' => null
        ], ['land']);
    }
}
