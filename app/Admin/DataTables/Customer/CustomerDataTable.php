<?php

namespace App\Admin\DataTables\Customer;

use App\Admin\DataTables\BaseDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerDataTable extends BaseDatatable
{

    protected $adminRepository;

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        CustomerRepositoryInterface $repository
    ){
        parent::__construct();

        $this->adminRepository = $adminRepository;
        $this->repository = $repository;
        
        
    }

    public function getView(){
        return [
            'action' => 'admin.customer.datatable.action',
            'editlink' => 'admin.customer.datatable.editlink',
            'admin' => 'admin.customer.datatable.admin',
            'phone' => 'admin.customer.datatable.phone',

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
        // $this->filterColumnAdmin();
        $this->filterColumnBirthday();
        $this->filterColumnUpdatedAt();
        $this->editColumnId();
        $this->editColumnBirthday();
        $this->editColumnUpdatedAt();
        // $this->addColumnAdmin();
        $this->editColumnPhone();

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
        //     return $this->adminRepository->getQueryBuilderCustomerWithRelations($admin);
        // }
        $admin = auth()->guard('admin')->user();

        return $this->repository->getQueryBuilderWithRelations();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('customer-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Blfrtip')
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
                ->width(30),
            Column::make('fullname')->title(__('Họ tên'))->orderable(false),
            Column::make('phone')->title(__('Số điện thoại'))->orderable(false),
            Column::make('major')->title(__('Công việc'))->orderable(false),
            Column::make('address')->title(__('Địa chỉ'))->orderable(false),
            Column::make('email')->title(__('Email'))->orderable(false),
            Column::make('birthday')->title(__('Ngày sinh'))->orderable(false),
            // Column::make('admin')->title(__('NV nhập'))->orderable(false),
            Column::make('updated_at')->title(__('Ngày cập nhật'))->orderable(false),
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
        return 'Customer_' . date('YmdHis');
    }
    protected function filterColumnAdmin(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('admin', function($query, $keyword) {
            $query->whereHas('admin', function($q) use ($keyword) { 
                $q->where('fullname', 'like', "%{$keyword}%");
                $q->orWhere('phone', 'like', "%{$keyword}%");
            });
        });
    }
    protected function filterColumnBirthday(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('birthday', function($query, $keyword) {

            $query->whereDate('birthday', date('Y-m-d', strtotime($keyword)));

        });
    }
    protected function editColumnPhone(){
        $admin = auth()->guard('admin')->user();

        $this->instanceDataTable = $this->instanceDataTable->editColumn('phone', $this->view['phone']);
    }
    protected function filterColumnUpdatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('updated_at', function($query, $keyword) {

            $query->whereDate('updated_at', date('Y-m-d', strtotime($keyword)));

        });
    }
    protected function editColumnId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }
    protected function editColumnBirthday(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('birthday', '{{ date("d-m-Y", strtotime($birthday)) }}');
    }
    protected function editColumnUpdatedAt(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('updated_at', '{{ date("d-m-Y", strtotime($created_at)) }}');
    }
    protected function addColumnAdmin(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('admin', $this->view['admin']);
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['id', 'admin', 'action']);
    }
    protected function htmlParameters(){
        $this->instanceHtml = $this->instanceHtml
        ->parameters([
            // 'responsive' => true,
            // 'autoWidth' => false,
            'buttons' => ['excel', 'reset', 'reload'],
            'language' => [
                'url' => url('/public/lib/AdminLTE-3.2.0/plugins/datatables/language.json')
            ],
            'initComplete' => "function () {

                var r = $('#customer-table tfoot tr');

                $('#customer-table thead').append(r);

                SearchColumsDataTable(this);

            }",
        ]);
    }
}