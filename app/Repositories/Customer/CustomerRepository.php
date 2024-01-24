<?php

namespace App\Repositories\Customer;
use App\Repositories\EloquentRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Models\Customer;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    protected $select = ['id', 'fullname', 'id_number', 'id_date', 'id_location', 'email', 'phone', 'address', 'major', 'birthday', 'created_at'];

    public function getModel(){
        return Customer::class;
    }
    public function find($id)
    {
        $this->instance = $this->model->find($id);
        
        $this->authorize('view');

        return $this->instance;
    }
    
    public function searchAllLimit($value = '', $select = ['id', 'fullname', 'phone'], $limit = 10){
        
        $this->instance = $this->model->select($select);

        $this->getQueryBuilderFindByKey($value);

        return $this->instance->limit($limit)->get();
    }

    public function update($id, array $data)
    {
        $this->instance = $this->find($id);
        
        $this->authorize('update');

        if ($this->instance) {
            $this->instance->update($data);
            return $this->instance;
        }

        return false;
    }

    public function delete($id)
    {
        $this->instance = $this->find($id);
        
        $this->authorize('delete');
        
        if ($this->instance) {
            $this->instance->delete();

            return true;
        }

        return false;
    }

    public function getQueryBuilderMeetingWithRelations($customer, $relations = ['admin:id,fullname', 'customer:id,fullname,phone']){
        return $customer->meeting()->with($relations)->getQuery();
    }

    public function getQueryBuilderWithRelations(array $relations = ['admin']){

        $this->getQueryBuilder();

        return $this->instance->with($relations);

    }
    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->Where(function($query) use ($key){
            return $query
                    ->where('fullname', 'LIKE', '%'.$key.'%')
                    ->orWhere('phone', 'LIKE', '%'.$key.'%')
                    ->orWhere('email', 'LIKE', '%'.$key.'%');
        });
    }
}