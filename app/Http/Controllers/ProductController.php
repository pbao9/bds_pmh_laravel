<?php

namespace App\Http\Controllers;

use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Responses\ResponseInterface;
use App\Traits\Config;
// use App\Models\HouseOwner;
use App\Models\Admin;
use App\Models\Category;

class ProductController extends Controller
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
        $this->select = ['id', 'house_owner_id', 'admin_id', 'avatar', 'purpose', 'updated_at', 'slug', 'door_direction',
        'title', 'price', 'created_at', 'area', 'content', 'district_id', 'image', 'bedroom', 'floor', 'road_house',
        'toilet', 'area'];
    }

    public function getView(){
        return [
            'index' => 'home.products.product.index',
            '401' => 'errors.401',
        ];
    }

    public function index($request, $slug) {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations($this->select, 
        ['admin:id,fullname,phone'])->where('slug', $slug)->with('house_owner')->first();
        // ['house_owner:id,fullname,phone'])->where('slug', $slug)->first();

        
        // $count_blog = HouseOwner::with('land')->where('id',$this->instance->house_owner_id)->first()->land->count();
        $count_blog = Admin::with('land')->where('id',$this->instance->admin_id)->first()->land->count();
        $category = Category::where('slug', $request)->first();
        
        return $this->response->viewRequired($this->view['index'], [
            'land' => $this->instance,
            'count_blog' => $count_blog,
            'category' => $category,
            'fullname' => 1,
        ], ['land']);
    }
}
