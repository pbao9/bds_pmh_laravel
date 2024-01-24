<?php

namespace App\Repositories\Category;
use App\Repositories\EloquentRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{

    protected $select = ['id', 'name', 'position', 'status', 'created_at'];

    public function getModel(){
        return Category::class;
    }

    public function searchAllLimit($value = '', $select = ['id', 'name'], $limit = 10){
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
    protected function getQueryBuilderFindByKey($key){
        $this->instance = $this->instance->where('name', 'LIKE', '%'.$key.'%');
    }
}