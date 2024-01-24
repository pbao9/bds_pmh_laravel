<?php

namespace App\Admin\DataTables\Category;

use App\Admin\DataTables\BaseDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Category\CategoryRepositoryInterface;
use Yajra\DataTables\Services\DataTable;
use App\Traits\Config;

class CategoryDataTable extends BaseDatatable
{
    use Config;

    public function __construct(
        CategoryRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
        
    }

    public function getView(){
        return [
            'action' => 'admin.category.datatable.action',
            'editlink' => 'admin.category.datatable.editlink'
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
        $this->filterColumnStatus();
        $this->editColumnName();
        $this->editColumnStatus();
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
        return $this->repository->getQueryBuilder();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('categoryTable')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->orderBy(0, 'ASC');

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    protected function getColumns()
    {
        return [
            Column::make('position')
                ->title(__('STT'))
                ->width('60'),
            Column::make('name')->title(__('Tên danh mục'))->orderable(false),
            Column::make('status')->title(__('Trạng thái'))->orderable(false),
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
        return 'Category_' . date('YmdHis');
    }
    protected function filterColumnStatus(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('status', function($query, $keyword) {
            $query->where('status', array_search($keyword, self::traitGetCategoryStatus()));
        });
    }
    protected function editColumnName(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('name', $this->view['editlink']);
    }
    protected function editColumnStatus(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('status', '{{ getCategoryStatus($status) }}');
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['name', 'action']);
    }
    protected function htmlParameters(){

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#categoryTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
        
    }
}