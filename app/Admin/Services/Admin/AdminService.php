<?php

namespace App\Admin\Services\Admin;

use App\Admin\Services\Admin\AdminServiceInterface;
use  App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminService implements AdminServiceInterface
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

    public function __construct(AdminRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();

        $this->data['password'] = bcrypt($this->data['password']);

        return $this->repository->create($this->data);
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        if(isset($this->data['password']) &&  $this->data['password']){
            $this->data['password'] = bcrypt($this->data['password']);
        }else{
            unset($this->data['password']);
        }

        return $this->repository->update($this->data['id'], $this->data);

    }
    public function moveCustomer(Request $request){

        $this->data = $request->validated();

        $customer = $this->repository->getCustomer($this->data['admin_from_id'])->pluck('id');

        $admin_to = $this->repository->find($this->data['admin_to_id']);

        $this->instance = $this->repository->syncCustomer($admin_to, $customer);
        
        return $this->instance;

    }

    public function CheckSamePassword($password, $hashPassword){

        return Hash::check($password, $hashPassword) ? true : false;
    }

    public function destroy($id){

        return $this->repository->delete($id);

    }

}