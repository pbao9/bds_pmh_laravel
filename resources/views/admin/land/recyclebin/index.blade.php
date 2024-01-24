@extends('admin.layout')

@section('title', __('Quản lý BĐS'))

@push('css')
<!-- select2 bs4 css -->
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- select2 css -->
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Quản lý BĐS') }}</h1>
        </div><!-- /.col -->
    </x-admin.partials.page-header>
    <!-- /.content-header -->
    <!-- Main content -->
    <x-admin.partials.page-content>
        <div class="col-lg-12">
            <x-card class="card-default color-palette-box">
                <x-slot name="header">
                    <x-card.header class="d-flex justify-content-between">
                        <h3 class="card-title">
                            {{ __('Thùng rác BĐS') }}
                            @isset($admin)
                                    - 
                                <x-link :href="route('admin.admin.edit', $admin->id)" :title="$admin->fullname" />
                            @endisset
                        </h3>
                        <x-link :href="route('admin.land.create')" :title="__('Thêm BĐS')" class="btn btn-sm btn-primary shadow-sm ml-auto">
                            <x-link.icon class="fa fa-user-plus" />
                        </x-link>
                    </x-card.header>
                </x-slot>
                <x-form id="formMultiple" :action="route('admin.land.multiple')" type="post" :validate="true">
                    <div class="table-responsive position-relative">
                        <div class="select-action-multiple" style="display: none;">
                            <div class="input-group col-12 col-md-6 ml-auto p-0">
                                <x-select name="action" :required="true" data-parsley-errors-container=".error-action">
                                    <x-option value="" :title="__('Chọn hành động')" />
                                    <x-option value="restore" :title="__('Khôi phục')" />
                                    <x-option value="forceDelete" :title="__('Xóa vĩnh viễn')" />
                                </x-select>
                                <div class="input-group-append">
                                    <x-button.submit :title="__('Áp dụng')" />
                                </div>
                            </div>
                            <div class="error-action col-12 col-md-6 ml-auto p-0"></div>
                        </div>
                        {{$dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width:1800px;'], true)}}
                    </div>
                </x-form>
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
<x-form id="formRestore" action="" type="put" />
<x-form id="formDelete" action="" type="delete" />
@endsection

@push('plugin-js')
<!-- select2 bs4 js -->
<script src="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- button in datatable -->
<script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>

@endpush

@push('js')

<script src="{{ asset('public/admin/assets/js/datatable.js') }}"></script>

{{ $dataTable->scripts() }}

<script>
    var routeDistrict = '{{ route("admin.address.district.selectsearch") }}',
    routeWard = '{{ route("admin.address.ward.selectsearch") }}';
    $(document).on('click', '.search-advanced ~ i', function(){
        $('.search-advanced').slideToggle();
    });
</script>

@include('admin.land.script.dataTable')

@include('admin.land.script.select2')

@endpush
