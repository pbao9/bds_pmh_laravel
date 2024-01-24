<?php

namespace App\Admin\DataTables\Land;

use App\Admin\DataTables\BaseDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use App\Repositories\Land\LandRepositoryInterface;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Support\Str;

class LandDataTable extends BaseDatatable
{

    protected $adminRepository;

    protected $actions = ['excel', 'reset', 'reload'];

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        LandRepositoryInterface $repository
    ){
        parent::__construct();

        $this->adminRepository = $adminRepository;
        $this->repository = $repository;
        
        
    }

    public function getView(){
        return [
            'action' => 'admin.land.datatable.action',
            'purpose' => 'admin.land.datatable.purpose',
            'editlink' => 'admin.land.datatable.editlink',
            'houseowner' => 'admin.land.datatable.houseowner',
            'checkbox' => 'admin.land.datatable.checkbox',
            'address' => 'admin.land.datatable.address',
            'category' => 'admin.land.datatable.category',
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
        $this->filterColumnPurpose();
        $this->filterColumnHouseOwner();
        $this->filterColumnCategories();
        $this->filterColumnAddress();
        $this->editColumnId();
        $this->editColumnCategories();
        $this->editColumnPurpose();
        $this->editColumnPrice();
        $this->editColumnAddress();
        $this->addColumnCheckbox();
        $this->addColumnHouseOwner();
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
        ->setTableId('customer-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Blfrtip')
        ->orderBy(1);

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
            Column::make('id')
                ->title(__('ID'))
                ->width(60),
            Column::make('code')->title(__('Mã BĐS'))->orderable(false),
            Column::make('house_owner')->title(__('Chủ nhà'))->orderable(false),
            Column::make('categories')->title(__('Danh mục'))->width(200)->orderable(false),
            Column::make('type')->title(__('Loại BĐS'))->width(115)->orderable(false),
            Column::make('purpose')->title(__('Mục đích'))->width(115)->orderable(false),
            Column::make('status')->title(__('Trạng thái'))->width(115)->orderable(false),
            Column::make('address')->title(__('Địa chỉ'))->width(220)->orderable(false),
            Column::make('price')->title(__('Giá'))->orderable(false),
            // Column::make('address')->title(__('Địa chỉ')),
            // Column::make('created_at')->title(__('Ngày tạo')),
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
    protected function filterColumnPurpose(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('purpose', function($query, $keyword) {

            $keyword = Str::of($keyword)->slug('-');

            $query->where('purpose', 'like', "%{$keyword}%");

        });
    }
    protected function filterColumnHouseOwner(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('house_owner', function($query, $keyword) {

            $admin = auth()->guard('admin')->user();

            if($admin->role == 'employee'){
                $query->where('admin_id', $admin->id);
            }

            $query->whereHas('house_owner', function($q) use ($keyword) { 
                $q->where('fullname', 'like', "%{$keyword}%");
                $q->orWhere('phone', 'like', "%{$keyword}%");
                
            });

        });
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
    protected function filterColumnAddress(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('address', function($query, $keyword) {
            $keyword = explode("|", $keyword);
            if(isset($keyword[0]) && $keyword[0] && $keyword[0] != 'null'){
                $query->where(function($q) use ($keyword){
                    $q->where('address', 'like', "%{$keyword[0]}%");
                    $q->orWhereHas('district', function($q) use ($keyword){
                        $q->where('name', 'like', "%{$keyword[0]}%");
                    });
                    $q->orWhereHas('ward', function($q) use ($keyword){
                        $q->where('name', 'like', "%{$keyword[0]}%");
                    });
                });
            }
            if(isset($keyword[2]) && $keyword[2] != 0){
                if($keyword[2] &&  $keyword[2] != 'null'){
    
                    $query->where('district_id', $keyword[2]);
                }
                if(isset($keyword[1]) && $keyword[1] && $keyword[1] != 'null'){

                    $query->where('ward_id', $keyword[1]);
                    
                }
            }

        });
    }
    protected function editColumnId(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('id', $this->view['editlink']);
    }
    protected function editColumnCategories(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('categories', $this->view['category']);
    }
    protected function editColumnPurpose(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('purpose', $this->view['purpose']);
    }
    protected function editColumnPrice(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('price', '{{ number_format($price)." ".$currency }}');
    }
    protected function editColumnAddress(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('address', $this->view['address']);
    }
    protected function addColumnCheckbox(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('checkbox', $this->view['checkbox']);
    } 
    protected function addColumnHouseOwner(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('house_owner', $this->view['houseowner']);
    }
    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }
    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['id', 'house_owner', 'categories', 'action', 'checkbox']);
    }

    protected function htmlParameters(){
        $this->instanceHtml = $this->instanceHtml
        ->parameters([
            // 'responsive' => true,
            // 'autoWidth' => false,
            'buttons' => $this->actions,
            'language' => [
                'url' => url('/public/lib/AdminLTE-3.2.0/plugins/datatables/language.json')
            ],
            'initComplete' => "function () {

                var r = $('#customer-table tfoot tr');

                $('#customer-table thead').append(r);

                SearchColumsDataTable(this);

                // search data for categories
                select2LoadData(route, target);

                select2SearchColumnsDatatables();

            }",
        ]);
    }
    
}