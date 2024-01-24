<?php

namespace App\Repositories\Land;
use App\Repositories\EloquentRepository;
use App\Repositories\Land\LandRepositoryInterface;
use App\Models\Land;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LandRepository extends EloquentRepository implements LandRepositoryInterface
{
    protected $select = ['id', 'code', 'house_owner_id', 'admin_id', 'type', 'purpose', 'level', 'status', 'furniture', 'door_direction', 'area', 'price', 'currency', 'district_id', 'ward_id', 'address', 'created_at'];

    public function getModel(){
        return Land::class;
    }
    public function searchAllLimit($value = '', $select = ['id', 'title', 'code'], $limit = 10){
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
        // $this->authorize('view');
        return $this->instance;
    }

    public function findWithTrashed($id)
    {
        $this->instance = $this->model->withTrashed()->find($id);
        // $this->authorize('view');

        return $this->instance;
    }
    public function findWithRelations($id, $relations = ['house_owner:id,fullname,phone', 'districtWithWard:code,name', 'categories'])
    {
        $this->findWithTrashed($id);

        $this->instance = $this->instance->load($relations);
        
        return $this->instance;
    }
    public function createHasCategory(array $data, array $category){

        $this->instance = $this->create($data);

        $this->syncCategory($this->instance, $category);
        return $this->instance;
    }
    public function update($id, array $data)
    {
        $this->instance = $this->findWithTrashed($id);
        
        $this->authorize('update');


        if ($this->instance) {
            $this->instance->update($data);
            return $this->instance;
        }

        return false;
    }
    public function updateHasCategory($id, array $data, array $category){
        
        $this->update($id, $data);

        $this->syncCategory($this->instance, $category);
        
        return $this->instance;
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

    public function deleteBy($field, $value, $compare = '=')
    {
        $this->instance = $this->model->where($field, $compare, $value);
        

        return $this->instance->delete();
    }

    

    public function restore($id)
    {
        $this->instance = $this->findWithTrashed($id);
        
        $this->authorize('restore');
        
        if ($this->instance) {
            $this->instance->restore();

            return true;
        }

        return false;
    }

    public function forceDelete($id)
    {
        $this->instance = $this->findWithTrashed($id);

        $this->authorize('forceDelete');
        
        if ($this->instance) {
            $this->instance->forceDelete();

            return true;
        }

        return false;
    }
    public function forceDeleteBy($field, $value, $compare = '=')
    {
        $this->instance = $this->model->onlyTrashed()->where($field, $compare, $value);
        

        return $this->instance->forceDelete();
    }
    
    public function syncCategory($land, $category) {
        return $land->categories()->sync($category);
    }

    public function getQueryBuilderSelectWithRelationsOnlyTrash(array $select = [], $relations = ['house_owner:id,fullname,phone', 'district:code,name', 'ward:code,name', 'categories']){

        return $this->getQueryBuilderSelectWithRelations($select, $relations)->onlyTrashed();

    }

    public function getQueryBuilderSelectWithRelations(array $select = [], $relations = ['house_owner:id,fullname,phone', 'district:code,name', 'ward:code,name', 'categories']){

        $this->getQueryBuilder();

        return $this->instance->select(count($select) > 0 ? $select : $this->select)->with($relations);

    }

    public function authorize($action){

        if(auth()->guard('admin')->user()->can($action, $this->instance)){
            return true;
        }

        throw new HttpException(401, 'UNAUTHORIZED');
    }
    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->Where(function($query) use ($key){
            return $query
                    ->where('title', 'LIKE', '%'.$key.'%')
                    ->orWhere('code', 'LIKE', '%'.$key.'%');
        });
    }
}