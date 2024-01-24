<?php

namespace App\Admin\DataTables\Admin;

use App\Admin\DataTables\MeetingDataTable;

class AdminListMeetingDataTable extends MeetingDataTable
{
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->adminRepository->getQueryBuilderMeetingWithRelations($this->admin);
    }


}