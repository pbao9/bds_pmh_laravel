<?php

namespace App\Admin\Http\Controllers\Contract;

use App\Traits\Config;
use App\Http\Controllers\Controller;
use App\Responses\ResponseInterface;
use App\Admin\DataTables\Contract\ContractDataTable;
use App\Admin\Http\Requests\Contract\ContractRequest;
use App\Admin\Services\Contract\ContractServiceInterface;
use App\Repositories\Contract\ContractRepositoryInterface;
use Carbon\Carbon;

use App\Models\Contract;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    use Config;

    public function __construct(
        ContractRepositoryInterface $repository,
        ContractServiceInterface $service,
        ResponseInterface $response
    ) {

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;

        $this->response = $response;
    }


    public function getView()
    {
        return [
            'index' => 'admin.contract.index',
            'create' => 'admin.contract.create',
            'edit' => 'admin.contract.edit',
            'form_create_rental' => 'admin.contract.include.form_create_rental',
            'form_create_transfer' => 'admin.contract.include.form_create_transfer',
            'form_edit_rental' => 'admin.contract.include.form_edit_rental',
            'form_edit_transfer' => 'admin.contract.include.form_edit_transfer',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.contract.index',
            'create' => 'admin.contract.create',
            'edit' => 'admin.contract.edit',
            'delete' => 'admin.contract.delete',
        ];
    }
    public function index(ContractDataTable $dataTable)
    {
        return $dataTable->render($this->view['index']);
    }

    public function create()
    {

        return $this->response->view(
            $this->view['create'],
            [
                'type' => $this->traitGetContractType(),
            ] // call to function trait config
        );

        dd($this);
    }

    public function getFormCreate($type)
    {
        $all_type = $this->traitGetContractType();
        $form_type = $all_type[$type]['form_type'];
        switch ($form_type) {
            case 1:
                return $this->response->viewRequired(
                    $this->view['form_create_rental'],
                    []
                );
                break;
            case 2:
                return $this->response->viewRequired(
                    $this->view['form_create_transfer'],
                    []
                );
                break;
            default:
                return $this->response->viewRequired(
                    $this->view['form_create_transfer'],
                    []
                );
                break;
        }
    }

    public function edit($id)
    {
        $this->instance = $this->repository->findWithRelations($id);
        $form_view = $this->getFormEdit($id, $this->instance->type);

        return $this->response->viewRequired(
            $this->view['edit'],
            [
                'contract' => $this->instance,
                'type' => $this->traitGetContractType(),
                'form_view' => $form_view
            ] // call to function trait config
        );
    }

    public function getFormEdit($id, $type)
    {
        $this->instance = $this->repository->findWithRelations($id);
        $all_type = $this->traitGetContractType();
        $form_type = $all_type[$type]['form_type'];
        switch ($form_type) {
            case 1:
                return $this->response->viewRequired(
                    $this->view['form_edit_rental'],
                    ['contract' => $this->instance,]
                )->render();
                break;
            case 2:
                return $this->response->viewRequired(
                    $this->view['form_edit_transfer'],
                    ['contract' => $this->instance,]
                )->render();
                break;
            default:
                return $this->response->viewRequired(
                    $this->view['form_edit_rental'],
                    ['contract' => $this->instance,]
                )->render();
                break;
        }
    }

    public function store(ContractRequest $request)
    {
        // dd($request->all());
        $this->instance = $this->service->store($request);
        if (isset($this->instance->id)) {
            return $this->response->routeId($this->route['edit'], $this->instance->id);
        } else {
            return back()->with('error', 'Vui lòng điền đầy đủ thông tin');
        }
    }

    public function update(ContractRequest $request)
    {
        // dd($request);
        $this->instance = $this->service->update($request);

        return $this->response->backCheckBoolean($this->instance);
    }


    public function destroy($id)
    {

        $this->boolean = $this->service->destroy($id);
        return $this->response->redirectCheckBoolean($this->boolean, $this->route['index']);
    }
}
