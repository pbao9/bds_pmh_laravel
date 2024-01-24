<?php

namespace App\Admin\DataTables;

use Illuminate\Contracts\View\Factory;
use Yajra\DataTables\Services\DataTable;
use Yajra\Datatables\Datatables;

class BaseDatatable extends DataTable
{
    protected $repository;
    /**
     * Mảng chứa đường dẫn tới views
     *
     * @var array
     */
    protected $view;
    /**
     * Current Object instance
     *
     * @var object|array|mixed
     */
    protected $instanceDataTable;
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    protected $instanceHtml;
    /**
     * config search columns
     *
     * @var array
     */
    protected $parameters;
    
    public function __construct(
        // Datatables $datatables, 
        // Factory $viewFactory
        ){
        
        // $this->datatables  = $datatables;
        // $this->viewFactory = $viewFactory;
        
        $this->setView();

        $this->setParameters();
        
    }

    public function getView(){
        return $this->view ?? [];
    }

    public function setView(){
        $this->view = $this->getView();
    }
    public function setParameters(){
        return $this->parameters = $this->getParameters();
    }
    public function getParameters(){
        return $this->parameters ?? [
            // 'responsive' => true,
            'autoWidth' => false,
            'language' => [
                'url' => url('/public/lib/AdminLTE-3.2.0/plugins/datatables/language.json')
            ]
        ];
    }
    
}