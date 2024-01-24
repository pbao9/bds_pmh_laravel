<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\DataTables\Admin\AdminListMeetingDataTable;

class AdminListMeetingController extends Controller
{
    public function __construct(
        AdminRepositoryInterface $repository
    ){

        parent::__construct();

        $this->repository = $repository;
        
    }

    public function getView(){
        return [
            'index' => 'admin.meeting.index',
        ];
    }

    public function index($id, AdminListMeetingDataTable $dataTable){

        $this->instance = $this->repository->find($id);
        
        return $dataTable->with('admin', $this->instance)->render($this->view['index'], ['admin' => $this->instance]);
    }

    
}