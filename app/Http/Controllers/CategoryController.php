<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Responses\ResponseInterface;
use App\Traits\Config;
use App\Models\District;
use App\Models\Category;


class CategoryController extends Controller
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

    public function index($request) {
        $category = Category::where('slug', $request)->with('address')->first();
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations($this->select, 
            ['house_owner:id,fullname'])->where('purpose', $request)->get();
        return $this->response->viewRequired($this->view['index'], [
            'category' => $category,
            'land' => $category->address,
            'name_purpose' => $request,
            'name_district' => null,
            'name_customer' => null
        ], ['category']);
    }

    public function indexDistrict($request) {
        $code_district = District::where('codename',$request)->first()->code;
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations($this->select, 
            ['house_owner:id,fullname', 'district:code,name,codename', 'category_to_land:category_id,land_id'])
            ->where('district_id', $code_district)->get();
            
        if ($this->instance->first() == null) {
            return $this->response->viewRequired($this->view['401'],[
                'code'=> '404',
                'message' =>'Trang này không tồn tại', 
                'title'=>'Trang này không tồn tại']);
        }
        
        return $this->response->viewRequired($this->view['index'], [
            'land' => $this->instance,
            'name_purpose' => $request,
            'name_district' => District::where('codename',$request)->first()->name,
            'name_customer' => null,
            'category' => null,
        ], ['land']);
    }

    public function indexPurpose($request) {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations($this->select, 
            ['admin:id,fullname'])->where('purpose', $request)->get();
        return $this->response->viewRequired($this->view['index'], [
            'category' => null,
            'land' => $this->instance,
            'name_purpose' => $request,
            'name_district' => null,
            'name_staff' => null
        ], ['land']);
    }
}
