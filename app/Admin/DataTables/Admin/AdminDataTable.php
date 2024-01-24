<?php

namespace App\Admin\DataTables\Admin;

use App\Admin\DataTables\BaseDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Admin\AdminRepositoryInterface;
use Yajra\DataTables\Services\DataTable;
use App\Traits\Config;

class AdminDataTable extends BaseDatatable
{
    use Config;

    public function __construct(
        AdminRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.admin.datatable.action',
            'editlink' => 'admin.admin.datatable.editlink',
        ];
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $this->instanceDataTable = datatables()->eloquent($query);
        $this->filterColumnRole();
        $this->filterColumnCreatedAt();
        $this->editColumnId();
        $this->editColumnRole();
        $this->editColumnCreatedAt();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderFilterRole();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('adminTable')
        ->columns($this->getColumns())
        ->minifiedAjax()
        // ->dom('Bfrtip')
        ->orderBy(0);

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                ->title(__('ID'))
                ->width('60'),
            // Column::make('id')->title(__('ID')),
            Column::make('fullname')->title(__('Họ tên')),
            Column::make('email')->title(__('Email')),
            Column::make('phone')->title(__('Số điện thoại')),
            Column::make('role')->title(__('Role')),
            Column::make('created_at')->title(__('Ngày tạo')),
            Column::computed('action')
                ->title(__('Thao tác'))
                ->exportable(false)
                ->printable(false)
                ->printable(false)
                // ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
    protected function filterColumnRole(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('role', function($query, $keyword) {
            $query->where('role', array_search($keyword, self::traitGetRoleAdmin()));
        });
    }
    protected function filterColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('created_at', function($query, $keyword) {

            $query->whereDate('created_at', date('Y-m-d', strtotime($keyword)));

        });
    }
    protected function editColumnId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }
    protected function editColumnRole(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('role', '{{ getAllRoleAdmin($role) }}');
    }
    protected function editColumnCreatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}');
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['id', 'role', 'action']);
    }
    protected function htmlParameters(){
        $this->instanceHtml = $this->instanceHtml
        ->parameters([
            // 'responsive' => true,
            'autoWidth' => false,
            'language' => [
                'url' => url('/public/lib/AdminLTE-3.2.0/plugins/datatables/language.json')
            ],
            'initComplete' => "function () {

                moveSearchColumnsDatatable('#adminTable');

                SearchColumsDataTable(this);
            }",
        ]);
    }
}