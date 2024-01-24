<?php

namespace App\Repositories\Contract;

use App\Repositories\EloquentRepository;
use App\Repositories\Contract\ContractRepositoryInterface;
use App\Models\Contract;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ContractRepository extends EloquentRepository implements ContractRepositoryInterface
{
    protected $select = [];

    public function getModel()
    {
        return Contract::class;
    }
    public function searchAllLimit($value = '', $select = ['id', 'name', 'code'], $limit = 10)
    {
        $this->instance = $this->model->select($select);

        $admin = auth()->guard('admin')->user();
        if ($admin->role != 'admin' && $admin->role != 'dev') {
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


    public function findWithRelations($id, $relations = [])
    {
        $this->find($id);

        $this->instance = $this->instance->load($relations);

        // $this->authorize('view');
        // dd($this->instance);
        return $this->instance;
    }
    public function update($id, array $data)
    {
        $this->instance = $this->find($id);

        // $this->authorize('update');

        if ($this->instance) {
            $this->instance->update($data);
            return $this->instance;
        }

        return false;
    }
    public function delete($id)
    {
        $this->instance = $this->find($id);

        // $this->authorize('delete');

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
        $this->instance = $this->find($id);

        $this->authorize('restore');

        if ($this->instance) {
            $this->instance->restore();

            return true;
        }

        return false;
    }

    public function forceDelete($id)
    {
        $this->instance = $this->find($id);

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


    public function getQueryBuilderSelectWithRelations(array $select = [], $relations = [])
    {

        $this->getQueryBuilder();

        return $this->instance->with($relations);
    }

    public function authorize($action)
    {

        if (auth()->guard('admin')->user()->can($action, $this->instance)) {
            return true;
        }

        throw new HttpException(401, 'UNAUTHORIZED');
    }
    protected function getQueryBuilderFindByKey($key)
    {
        $this->instance = $this->instance->Where(function ($query) use ($key) {
            return $query
                ->where('name', 'LIKE', '%' . $key . '%')
                ->orWhere('code', 'LIKE', '%' . $key . '%');
        });
    }
}
