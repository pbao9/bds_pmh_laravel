<?php

namespace App\Admin\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Admin\DataTables\Customer\CustomerListMeetingDataTable;

class CustomerListMeetingController extends Controller
{
    public function __construct(
        CustomerRepositoryInterface $repository
    ){

        parent::__construct();

        $this->repository = $repository;
        
    }

    public function getView(){
        return [
            'index' => 'admin.meeting.index',
        ];
    }

    public function index($id, CustomerListMeetingDataTable $dataTable){

        $this->instance = $this->repository->find($id);
        
        return $dataTable->with('customer', $this->instance)->render($this->view['index'], ['customer' => $this->instance]);
    }   
}