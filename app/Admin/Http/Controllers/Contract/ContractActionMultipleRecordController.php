<?php

namespace App\Admin\Http\Controllers\Contract;

use App\Admin\Http\Requests\Contract\ContractActionMultipleRecordRequest;
use App\Admin\Services\Contract\ContractServiceInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Contract\ContractRepositoryInterface;
use Illuminate\Http\Request;

class ContractActionMultipleRecordController extends Controller
{
    public function __construct(
        ContractRepositoryInterface $repository,
        ContractServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function action(ContractActionMultipleRecordRequest $request)
    {

        $this->instance = $this->service->actionMultipleRecord($request);

        return $this->response->backCheckBoolean($this->instance);
    }
}
