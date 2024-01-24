<?php

namespace App\Admin\DataTables\Contract;

use App\Admin\DataTables\BaseDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Column\Checkbox;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Contract\ContractRepositoryInterface;
use Illuminate\Support\Str;

class ContractDataTable extends BaseDatatable
{

    protected $adminRepository;

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        ContractRepositoryInterface $repository
    ) {
        parent::__construct();

        $this->adminRepository = $adminRepository;
        $this->repository = $repository;
    }

    public function getView()
    {
        return [
            'action' => 'admin.contract.datatable.action',
            'checkbox' => 'admin.contract.datatable.checkbox',
            'editlink' => 'admin.contract.datatable.editlink',
            'editlandname' => 'admin.contract.datatable.editlandname',
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
        $this->addColumnAction();
        $this->addColumnSelectId();
        $this->rawColumnsNew();
        $this->editColumnId();
        $this->editColumnType();
        $this->editColumnLandName();
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
        if (in_array($admin->role, ['dev', 'admin'])) {
            return $this->repository->getQueryBuilderSelectWithRelations();
        }
        return $this->adminRepository->getQueryBuilderContractWithRelations($admin);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->instanceHtml = $this->builder()
            ->setTableId('contract-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(0)
            ->buttons([
                'excel', // Thêm nút Excel
                'reset',
                'reload',
            ]);

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
                ->footer('<input type="checkbox" class="check-all"/>')
                ->addClass('text-center'),
            Column::make('id')
                ->title(__('ID'))
                ->width(60),

            Column::make('name')->title(__('Tên')),
            Column::make('code')->title(__('Mã')),
            Column::make('land_name')->title(__('Tên bất động sản')),
            // Column::make('customer')->title(__('Khách hàng')),
            // Column::make('price')->title(__('Giá cho thuê/chuyển nhượng')),
            Column::make('type')->title(__('Loại hợp đồng')),
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
        // dd('Contract_' . date('YmdHis') . '.xlsx');
        return 'Contract_' . date('YmdHis') . '.xlsx';
    }

    protected function editColumnId()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }
    protected function editColumnLandName()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('land_name', $this->view['editlandname']);
    }

    protected function editColumnType()
    {
        $this->instanceDataTable = $this->instanceDataTable->editColumn('type', '{{ getTypeContract($type) }}');
    }
    protected function addColumnAction()
    {
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function addColumnSelectId()
    {
        $this->instanceDataTable = $this->instanceDataTable->addColumn('checkbox', $this->view['checkbox']);
    }


    protected function rawColumnsNew()
    {
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['id', 'action', 'checkbox']);
    }

    protected function htmlParameters()
    {
        $this->instanceHtml = $this->instanceHtml
            ->parameters([

                'buttons' => ['excel', 'reset', 'reload'],
                'language' => [
                    'url' => url('/public/lib/AdminLTE-3.2.0/plugins/datatables/language.json')
                ],
                'initComplete' => "function () {

                var r = $('#contract-table tfoot tr');

                $('#contract-table thead').append(r);

                this.api().columns([1, 2,3,4, 5 ]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                
                    input.setAttribute('placeholder', 'Nhập từ khóa');
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


