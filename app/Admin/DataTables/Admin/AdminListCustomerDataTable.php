<?php

namespace App\Admin\DataTables\Admin;

use App\Admin\DataTables\Customer\CustomerDataTable;

class AdminListCustomerDataTable extends CustomerDataTable
{
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->adminRepository->getQueryBuilderCustomer($this->admin);
    }


}