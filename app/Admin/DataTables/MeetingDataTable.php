<?php

namespace App\Admin\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Meeting\MeetingRepositoryInterface;
use Yajra\DataTables\Services\DataTable;

class MeetingDataTable extends BaseDatatable
{

    protected $adminRepository;

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        MeetingRepositoryInterface $repository
    ){
        parent::__construct();

        $this->adminRepository = $adminRepository;
        $this->repository = $repository;
        
        
    }

    public function getView(){
        return [
            'action' => 'admin.meeting.datatable.action',
            'editlink' => 'admin.meeting.datatable.editlink',
            'admin' => 'admin.meeting.datatable.admin',
            'customer' => 'admin.meeting.datatable.customer',
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
        $this->filterColumnCustomerId();
        $this->filterColumnTime();
        $this->editColumnId();
        $this->editColumnAdminId();
        $this->editColumnCustomerId();
        $this->editColumnTime();
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
        $admin = auth()->guard('admin')->user();

        if($admin->role == 'employee'){
            return $this->adminRepository->getQueryBuilderMeetingWithRelations($admin);
        }
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
                ->width(60),
            Column::make('admin_id')->title(__('Nhân viên')),
            Column::make('customer_id')->title(__('Khách hàng')),
            Column::make('time')->title(__('Thời gian')),
            Column::make('status')->title(__('Trạng thái')),
            Column::make('address')->title(__('Địa chỉ')),
            Column::make('content')->title(__('Nội dung')),
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
        return 'meeting_' . date('YmdHis');
    }
    protected function filterColumnAdminId(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('admin_id', function($query, $keyword) {

            $query->whereHas('admin', function($q) use ($keyword) { 
                $q->where('fullname', 'like', "%{$keyword}%");
                $q->orWhere('phone', 'like', "%{$keyword}%");
                
            });

        });
    }
    protected function filterColumnCustomerId(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('customer_id', function($query, $keyword) {

            $query->whereHas('customer', function($q) use ($keyword) { 
                $q->where('fullname', 'like', "%{$keyword}%");
                $q->orWhere('phone', 'like', "%{$keyword}%");
            });

        });
    }
    protected function filterColumnTime(){
        $this->instanceDataTable = $this->instanceDataTable->filterColumn('time', function($query, $keyword) {

            $query->whereDate('time', date('Y-m-d', strtotime($keyword)));

        });
    }
    protected function editColumnTime(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('time', '{{ date("d-m-Y H:i:s", strtotime($time)) }}');
    }
    protected function editColumnCustomerId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('customer_id', $this->view["customer"]);
    }
    protected function editColumnAdminId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('admin_id', $this->view["admin"]);
    }
    protected function editColumnId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view["editlink"]);
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['id', 'admin_id', 'customer_id', 'action']);
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

                var r = $('#customer-table tfoot tr');

                $('#customer-table thead').append(r);

                this.api().columns([0, 1, 2, 3, 4, 5]).every(function () {
                    var column = this;

                    var input = document.createElement(\"input\");
                    input.setAttribute('placeholder', 'Nhập từ khóa');
                    if(column.selector.cols == 3){
                        input.setAttribute('type', 'date');
                    }
                    if(column.selector.cols == 4){

                        var input = document.createElement(\"select\"), 
                        optionAll = document.createElement(\"OPTION\");
                        optionAll.text = '---Tất cả---';
                        optionAll.value = '';
                        input.setAttribute('class', 'form-control');
                        input.append(optionAll);

                        column.data().unique().sort().each(function(d, j) {
                            var option = document.createElement(\"OPTION\");
                            option.value = option.text = d;
                            input.append(option);
                        });

                    }
                    input.setAttribute('class', 'form-control');

                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }",
        ]);
    }
}