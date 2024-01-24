<?php

namespace App\Repositories\HouseOwner;
use App\Repositories\EloquentRepository;
use App\Repositories\HouseOwner\HouseOwnerRepositoryInterface;
use App\Models\HouseOwner;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HouseOwnerRepository extends EloquentRepository implements HouseOwnerRepositoryInterface
{
    protected $select = ['id', 'admin_id', 'fullname', 'id_number', 'id_date', 'id_location', 'phone', 'address', 'purpose', 'created_at'];

    public function getModel(){
        return HouseOwner::class;
    }
 
    public function searchAllLimit($value = '', $select = ['id', 'fullname', 'phone'], $limit = 10){
        $this->instance = $this->model->select($select);
        
        $admin = auth()->guard('admin')->user();
        if($admin->role != 'admin' && $admin->role != 'dev'){
            $this->instance =  $this->instance->Where('admin_id', $admin->id);
        }

        $this->getQueryBuilderFindByKey($value);

        return $this->instance->limit($limit)->get();
    }
    public function find($id)
    {
        $this->instance = $this->model->find($id);
        
        $this->authorize('view');

        return $this->instance;
    }
    public function findWithRelations($id, $relations = ['district:code,name'])
    {
        $this->find($id);
        $this->instance = $this->instance->load($relations);
        
        return $this->instance;
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
    
    public function getQueryBuilderWithRelations(array $relations = ['admin','district:code,name']){
        $this->getQueryBuilder();   
        return $this->instance->with($relations)->orderBy('id', 'desc');
    }

    public function getQueryBuilderSelect(array $select = []){
        $this->getQueryBuilder();
        return $this->instance->select(count($select) > 0 ? $select : $this->select);
    }
    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->Where(function($query) use ($key){
            return $query
                    ->where('fullname', 'LIKE', '%'.$key.'%')
                    ->orWhere('phone', 'LIKE', '%'.$key.'%');
        });
    }

}