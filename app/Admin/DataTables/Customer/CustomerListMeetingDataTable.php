<?php

namespace App\Admin\DataTables\Customer;

use App\Admin\DataTables\MeetingDataTable;
use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerListMeetingDataTable extends MeetingDataTable
{

    public function __construct(
        CustomerRepositoryInterface $repository
    ){
        $this->setAll();

        $this->repository = $repository;
        
        
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderMeetingWithRelations($this->customer);
    }


}