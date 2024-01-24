<?php

namespace App\Admin\DataTables\Post;

use App\Admin\DataTables\BaseDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Support\Str;

class PostDataTable extends BaseDatatable
{

    protected $adminRepository;

    protected $actions = ['excel', 'reset', 'reload'];

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        PostRepositoryInterface $repository
    ){
        parent::__construct();

        $this->adminRepository = $adminRepository;
        $this->repository = $repository;
        
        
    }

    public function getView(){
        return [
            'action' => 'admin.post.datatable.action',
            'editlink' => 'admin.post.datatable.editlink',
            'checkbox' => 'admin.post.datatable.checkbox',
            // 'category' => 'admin.post.datatable.category',
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
        // $this->filterColumnCategories();
        $this->editColumnTitle();
        // $this->editColumnCategories();
        $this->addColumnCheckbox();
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
        // $admin = auth()->guard('admin')->user();

        // if($admin->role == 'employee'){
        //     return $this->adminRepository->getQueryBuilderLandWithRelations($admin);
        // }
        return $this->repository->getQueryBuilderSelectWithRelations();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->addCheckbox()
        ->setTableId('postTable')
        ->columns($this->getColumns())
        ->minifiedAjax();

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
            Column::computed('checkbox')
            ->title(__('Chọn'))
            ->exportable(false)
            ->printable(false)
            ->printable(false)
            ->width(10)
            ->footer('<input type="checkbox" class="check-all"/>'),
            Column::make('title')->title(__('Tiêu đề'))->orderable(false),
            // Column::make('categories')->title(__('Danh mục'))->orderable(false),
            Column::make('status')->title(__('Trạng thái'))->orderable(false),
            Column::computed('action')
                ->title(__('Thao tác'))
                ->exportable(false)
                ->printable(false)
                ->printable(false)
                ->width(70)
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
        return 'land_' . date('YmdHis');
    }
    protected function filterColumnCategories(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('categories', function($query, $keyword) {
            $query->whereHas('categories', function($query) use ($keyword) {
                $query->whereIn('id', explode(',', $keyword));
                $query->orWhere('name', 'like', "%{$keyword}%");
            });
        });
    }
    protected function editColumnTitle(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('title', $this->view['editlink']);
    }
    protected function editColumnCategories(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('categories', $this->view['category']);
    }
    protected function addColumnCheckbox(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('checkbox', $this->view['checkbox']);
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['title', 'categories', 'action', 'checkbox']);
    }

    protected function htmlParameters(){
        $this->instanceHtml = $this->instanceHtml
        ->parameters([
            // 'responsive' => true,
            // 'autoWidth' => false,
            'ordering' => false,
            'buttons' => $this->actions,
            'language' => [
                'url' => url('/public/lib/AdminLTE-3.2.0/plugins/datatables/language.json')
            ],
            'initComplete' => "function () {

                var r = $('#postTable tfoot tr');

                $('#postTable thead').append(r);

                SearchColumsDataTable(this);

                // search data for categories
                // select2LoadData(route, target);

            }",
        ]);
    }
    
}