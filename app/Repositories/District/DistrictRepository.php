<?php

namespace App\Repositories\District;

use App\Repositories\EloquentRepository;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Models\District;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DistrictRepository extends EloquentRepository implements DistrictRepositoryInterface
{
    protected $select = ['id', 'code', 'name'];

    public function getModel(){
        return District::class;
    }
    public function searchAllLimit($value = '', $select = ['code', 'name'], $limit = 10){
        $this->instance = $this->model->select($select)
        ->where('name', 'LIKE', '%'.$value.'%')
        ->limit($limit)
        ->orderBy('code', 'ASC')
        ->get();

        return $this->instance;
        
    }

}