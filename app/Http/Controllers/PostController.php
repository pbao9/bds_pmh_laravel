<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Post\PostRepositoryInterface;
use App\Admin\Services\Post\PostServiceInterface;
use App\Responses\ResponseInterface;
use App\Traits\Config;
use App\Models\Category;


class PostController extends Controller
{
    use Config;

    public function __construct(
        PostRepositoryInterface $repository, 
        PostServiceInterface $service,
        ResponseInterface $response 
    ){
        $this->setView();
        $this->repository = $repository;   
        $this->service = $service;
        $this->response = $response;
        // $this->select = ['id', 'house_owner_id', 'avatar', 'purpose', 'slug', 'door_direction',
        // 'title', 'price', 'created_at', 'area', 'content', 'district_id'];
    }

    public function getView(){
        return [
            'index' => 'home.blogs.index',
            'post' => 'home.blogs.post',
            '401' => 'errors.401',
        ];
    }

    public function index() {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations()->get();
        return $this->response->viewRequired($this->view['index'], [
            'post' => $this->instance,
            'request' => null,
            'category' => null
        ], ['post']);
    }

    public function category($request) {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations()->get();
        $category = Category::where('slug', $request)->with('address_post')->first();
        // dd($category);
        return $this->response->viewRequired($this->view['index'], [
            'post' => $this->instance,
            'category' => $category,
            'request' => $request
        ], ['post']);
    }


    public function post($request) {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations()->where('slug', $request)->first();
        $category = Category::where('slug', $request)->with('address_post')->first();
        // dd($category);
        // dd($this->instance);
        return $this->response->viewRequired($this->view['post'], [
            'post' => $this->instance,
            'category' => $category,
            'request' => $request
        ], ['post']);
    }
}
