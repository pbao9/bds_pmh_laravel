<?php

namespace App\Repositories\Ward;

use App\Repositories\EloquentRepository;
use App\Repositories\Ward\WardRepositoryInterface;
use App\Models\Ward;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WardRepository extends EloquentRepository implements WardRepositoryInterface
{
    protected $select = ['id', 'code', 'name'];

    public function getModel(){
        return Ward::class;
    }
    public function searchAllLimit($value = '', $select = ['code', 'name'], $limit = 10){
        $this->instance = $this->model->select($select)
        ->where('name', 'LIKE', '%'.$value.'%')
        ->limit($limit)
        ->get();

        return $this->instance;
        
    }
    public function searchWithDistrictLimit($districtCode, $select = ['code', 'name']){
        $this->instance = $this->model->select($select)
        ->where('district_code', $districtCode)
        ->orderBy('code', 'ASC')
        ->get();

        return $this->instance;
        
    }

}