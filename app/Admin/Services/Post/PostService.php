<?php

namespace App\Admin\Services\Post;

use App\Admin\Services\Post\PostServiceInterface;
use  App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostService implements PostServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    /**
     * Current Object instance
     *
     * @var object|array|mixed
     */
    protected $instance;
    
    protected $repository;

    public function __construct(PostRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->marcoRequestStoreAndUpdate($request);

        return $this->repository->createHasCategory($this->data['post'], $this->data['category']);
    }

    public function update(Request $request){
        
        $this->marcoRequestStoreAndUpdate($request);

        return $this->repository->updateHasCategory($this->data['post']['id'], $this->data['post'], $this->data['category']);

    }
    
    public function destroy($id){

        return $this->repository->delete($id);

    }

    public function actionMultipleRecode(Request $request){
        $this->data = $request->validated();
        if($this->data['action'] == 'delete'){
            
            foreach($this->data['id'] as $value){
                $this->destroy($value);
            }
            return true;
        }

        return false;
    }

    protected function marcoRequestStoreAndUpdate(Request $request){

        $this->data['post'] = $request->validated();

        $this->data['category'] = $this->data['post']['category'] ?? [];

        unset($this->data['post']['category']);

    }

}