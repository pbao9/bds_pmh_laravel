<?php

namespace App\Admin\Services\Land;

use App\Admin\Services\Land\LandServiceInterface;
use  App\Repositories\Land\LandRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandService implements LandServiceInterface
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

    public function __construct(LandRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->marcoRequestStoreAndUpdate($request);

        return $this->repository->createHasCategory($this->data['land'], $this->data['category']);
    }

    public function update(Request $request){
        
        $this->marcoRequestStoreAndUpdate($request);

        return $this->repository->updateHasCategory($this->data['land']['id'], $this->data['land'], $this->data['category']);

    }
    public function restore($id){
        
        return $this->repository->restore($id);

    }
    
    public function destroy($id){

        return $this->repository->delete($id);

    }

    public function delete($id){

        return $this->repository->forceDelete($id);

    }

    public function actionMultipleRecode(Request $request){
        $this->data = $request->validated();
        if($this->data['action'] == 'delete'){
            
            foreach($this->data['id'] as $value){
                $this->destroy($value);
            }
            return true;
        }elseif($this->data['action'] == 'forceDelete'){

            foreach($this->data['id'] as $value){
                $this->delete($value);
            }
            return true;
        }elseif($this->data['action'] == 'restore'){

            foreach($this->data['id'] as $value){
                $this->restore($value);
            }
            return true;
        }

        return false;

    }

    protected function marcoRequestStoreAndUpdate(Request $request){

        $this->data['land'] = $request->validated();

        $this->data['land']['image'] = $this->data['land']['image'] ? explode(",", $this->data['land']['image']) : null;
        $this->data['category'] = $this->data['land']['category'];

        unset($this->data['land']['category']);

    }

}