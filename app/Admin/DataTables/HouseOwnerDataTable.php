<?php

namespace App\Admin\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\HouseOwner\HouseOwnerRepositoryInterface;
use Yajra\DataTables\Services\DataTable;

class HouseOwnerDataTable extends BaseDatatable
{

    protected $adminRepository;

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        HouseOwnerRepositoryInterface $repository
    ){
        parent::__construct();

        $this->adminRepository = $adminRepository;
        $this->repository = $repository;
        
        
    }

    public function getView(){
        return [
            'action' => 'admin.houseowner.datatable.action',
            'editlink' => 'admin.houseowner.datatable.editlink',
            'admin' => 'admin.houseowner.datatable.admin',
            'district' => 'admin.houseowner.datatable.district',
            'phone' => 'admin.houseowner.datatable.phone',

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
        $this->filterColumnAdminId();
        $this->filterColumnDistrict();
        $this->filterColumnUpdateddAt();
        $this->editColumnId();
        $this->editColumnAdminId();
        $this->editColumnUpdateddAt();
        $this->addColumnAction();
        $this->rawColumnsNew();
        $this->editColumnDistrict();
        $this->editColumnPhone();
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
        $admin = auth()->guard('admin')->user();
        // if($admin->role == 'employee'){
        //     return $this->adminRepository->getQueryBuilderHouseOwnerWithRelations($admin);
        // }

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
        ->setTableId('house-owner-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Blfrtip');

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
            Column::make('location')->title(__('Khu vực'))->orderable(false),
            Column::make('district_id')->title(__('Quận/huyện'))->orderable(false),
            Column::make('address')->title(__('Địa chỉ'))->orderable(false),
            Column::make('purpose')->title(__('Ký gửi'))->orderable(false),
            Column::make('note')->title(__('Ghi chú'))->orderable(false),
            Column::make('admin_id')->title(__('NV nhập'))->orderable(false),
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
        return 'HouseOwner_' . date('YmdHis');
    }

    protected function filterColumnAdminId(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('admin_id', function($query, $keyword) {
            $query->whereHas('admin', function($q) use ($keyword) { 
                $q->where('fullname', 'like', "%{$keyword}%");
                $q->orWhere('phone', 'like', "%{$keyword}%");
            });
        });
    }
    protected function filterColumnUpdateddAt(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('updated_at', function($query, $keyword) {

            $query->whereDate('updated_at', date('Y-m-d', strtotime($keyword)));

        });
    }
    protected function editColumnId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }
    protected function editColumnUpdateddAt(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('updated_at', '{{ date("d-m-Y", strtotime($updated_at)) }}');
    }
    protected function editColumnAdminId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('admin_id', $this->view['admin']);
    }
    protected function editColumnPhone(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('phone', $this->view['phone']);
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function editColumnDistrict(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('district_id', $this->view['district']);
    }

    protected function filterColumnDistrict() {
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('district_id', function($query, $keyword) {
            $query->whereHas('district', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            });
        });
    }

    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['id', 'admin_id', 'action']);
    }
    protected function htmlParameters(){
        $this->instanceHtml = $this->instanceHtml
        ->parameters([
            // 'responsive' => true,
            'autoWidth' => false,
            'buttons' => ['excel', 'reset', 'reload'],
            'language' => [
                'url' => url('/public/lib/AdminLTE-3.2.0/plugins/datatables/language.json')
            ],
            'initComplete' => "function () {

                var r = $('#house-owner-table tfoot tr');

                $('#house-owner-table thead').append(r);

                SearchColumsDataTableHouseOwner(this);

            }",
        ]);
    }
}