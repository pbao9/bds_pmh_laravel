<?php

namespace App\Admin\Http\Controllers\Contract;

use App\Traits\EPdf;
use App\Traits\Config;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Responses\ResponseInterface;
use App\Admin\DataTables\Contract\ContractDataTable;
use App\Admin\Http\Requests\Contract\ContractRequest;
use App\Admin\Services\Contract\ContractServiceInterface;
use App\Repositories\Contract\ContractRepositoryInterface;

class ContractPdfController extends Controller
{
    use Config;
    use EPdf;
    public function __construct(
        ContractRepositoryInterface $repository, 
        ContractServiceInterface $service, 
        ResponseInterface $response 
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
        $this->response = $response;
        
    }


    public function getView(){
        return $this->traitGetContractViewPdf();
    }

    public function getRoute(){
        return [
            'show' => 'admin.contract.pdf.show',
        ];
    }

    public function show($id){
        $this->instance = $this->repository->findWithRelations($id, []);
        // return $this->response->view( $this->view[$this->instance->type], ['data'=>$this->instance]);
        // dd($this->instance);
       return $this->exportPDF($this->view[$this->instance->type], $this->instance);
    }
}