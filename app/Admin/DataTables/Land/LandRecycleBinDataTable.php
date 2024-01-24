<?php

namespace App\Admin\DataTables\Land;

use App\Admin\DataTables\Land\LandDataTable;

class LandRecycleBinDataTable extends LandDataTable
{

    public function getView(){
        return [
            'action' => 'admin.land.recyclebin.datatable.action',
            'purpose' => 'admin.land.datatable.purpose',
            'editlink' => 'admin.land.datatable.editlink',
            'houseowner' => 'admin.land.datatable.houseowner',
            'checkbox' => 'admin.land.datatable.checkbox',
            'address' => 'admin.land.datatable.address',
            'category' => 'admin.land.datatable.category',
        ];
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $admin = auth()->guard('admin')->user();

        if($admin->role == 'employee'){
            return $this->adminRepository->getQueryBuilderLandWithRelationsOnlyTrash($admin);
        }
        return $this->repository->getQueryBuilderSelectWithRelationsOnlyTrash();
    }
}