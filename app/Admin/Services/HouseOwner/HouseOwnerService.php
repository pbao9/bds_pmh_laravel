<?php

namespace App\Admin\Services\HouseOwner;

use App\Admin\Services\HouseOwner\HouseOwnerServiceInterface;
use  App\Repositories\HouseOwner\HouseOwnerRepositoryInterface;
use Illuminate\Http\Request;

class HouseOwnerService implements HouseOwnerServiceInterface
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

    public function __construct(HouseOwnerRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();

        return $this->repository->create($this->data);
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);

    }

    public function destroy($id){

        return $this->repository->delete($id);

    }

}