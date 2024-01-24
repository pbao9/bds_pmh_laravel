<?php

namespace App\Admin\Services\Customer;

use App\Admin\Services\Customer\CustomerServiceInterface;
use  App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerService implements CustomerServiceInterface
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

    public function __construct(CustomerRepositoryInterface $repository){
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