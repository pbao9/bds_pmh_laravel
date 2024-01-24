<?php

namespace App\Repositories\Admin;
use App\Repositories\EloquentRepository;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Models\Admin;
use App\Traits\Config;

class AdminRepository extends EloquentRepository implements AdminRepositoryInterface
{
    use Config;

    protected $select = ['id', 'email', 'phone', 'fullname', 'role', 'created_at'];

    public function getModel(){
        return Admin::class;
    }

    public function searchAllLimit($value = '', $select = ['id', 'fullname', 'phone'], $limit = 10){
        $this->instance = $this->model->select($select)
        ->Where('role', 'employee');

        $this->getQueryBuilderFindByKey($value);

        return $this->instance->limit($limit)->get();
    }

    public function getCustomer($id){

        $this->instance = $this->find($id);

        $this->instance = $this->getQueryBuilderCustomer($this->instance);

        return $this->instance->get();

    }

    public function getLoginLog($admin){
        return $admin->loginLog()->orderBy('id', 'DESC')->paginate();
    }
    public function getQueryBuilderMeetingWithRelations($admin, $relations = ['admin:id,fullname', 'customer:id,fullname,phone']){
        return $admin->meeting()->with($relations)->getQuery();
    }
    public function getQueryBuilderLandWithRelations($admin, $relations = ['house_owner:id,fullname,phone', 'district:code,name', 'ward:code,name', 'categories']){
        return $admin->land()->with($relations)->getQuery();
    }

    public function getQueryBuilderLandWithRelationsOnlyTrash($admin, $relations = ['house_owner:id,fullname,phone', 'district:code,name', 'ward:code,name', 'categories']){
        return $admin->land()->onlyTrashed()->with($relations)->getQuery();
    }
    public function getQueryBuilderContractWithRelations($admin, $relations = []){
        return $admin->contract()->with($relations)->getQuery();
    }
    public function getQueryBuilderCustomerWithRelations($admin, $relations = ['admin']){
        return $admin->customer()->getQuery();
    }

    public function getQueryBuilderHouseOwnerWithRelations($admin, $relations = ['admin', 'district:code,name']){
        return $admin->house_owner()->with($relations)->getQuery();
    }

    public function syncCustomer($admin, $customer) {
        return $admin->customer()->sync($customer);
    }
    
    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->Where(function($query) use ($key){
            return $query
                    ->where('fullname', 'LIKE', '%'.$key.'%')
                    ->orWhere('phone', 'LIKE', '%'.$key.'%')
                    ->orWhere('email', 'LIKE', '%'.$key.'%');
        });
    }

    public function getQueryBuilderFilterRole(array $select = []){

        $this->getQueryBuilder();

        $this->instance = $this->instance->select(count($select) > 0 ? $select : $this->select);

        if(array_keys($this->traitGetRoleAdmin())[0] == 'admin'){ // call to function trait config

            $this->instance = $this->instance->whereNotIn('role', ['dev']);

        }
        return $this->instance;
    }
}