<?php

namespace App\Admin\DataTables\Admin;

use App\Admin\DataTables\HouseOwnerDataTable;

class AdminListHouseOwnerDataTable extends HouseOwnerDataTable
{
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->adminRepository->getQueryBuilderHouseOwner($this->admin);
    }


}