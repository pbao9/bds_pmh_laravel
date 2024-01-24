<?php

namespace App\Admin\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Admin\Http\Requests\Post\PostActionMultipleRecordRequest;
use App\Repositories\Post\PostRepositoryInterface;
use App\Admin\Services\Post\PostServiceInterface;
use App\Admin\DataTables\Post\PostRecycleBinDataTable;

class PostActionMultipleRecordController extends Controller
{

    public function __construct(
        PostRepositoryInterface $repository, 
        PostServiceInterface $service
    ){
        parent::__construct();
        
        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function action(PostActionMultipleRecordRequest $request){

        $this->instance = $this->service->actionMultipleRecode($request);

        return $this->response->backCheckBoolean($this->instance);

    }
}