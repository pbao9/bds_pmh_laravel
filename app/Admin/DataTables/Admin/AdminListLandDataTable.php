<?php

namespace App\Admin\DataTables\Admin;

use App\Admin\DataTables\Land\LandDataTable;

class AdminListLandDataTable extends LandDataTable
{
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->adminRepository->getQueryBuilderLandWithRelations($this->admin);
    }


}