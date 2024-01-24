@extends('admin.layout')

@section('title', __('Quản lý tin tức'))

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
            <h1 class="m-0">{{ __('Quản lý tin tức') }}</h1>
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
                            {{ __('Danh sách tin tức') }}
                            @isset($admin)
                                    - 
                                <x-link :href="route('admin.admin.edit', $admin->id)" :title="$admin->fullname" />
                            @endisset
                        </h3>
                        <x-link :href="route('admin.post.create')" :title="__('Thêm tin tức')" class="btn btn-sm btn-primary shadow-sm ml-auto">
                            <x-link.icon class="fa fa-user-plus" />
                        </x-link>
                    </x-card.header>
                </x-slot>
                <x-form id="formMultiple" :action="route('admin.post.multiple')" type="post" :validate="true">
                    <div class="table-responsive position-relative">
                        <div class="select-action-multiple" style="display: none;">
                            <div class="input-group col-12 col-md-6 ml-auto p-0">
                                <x-select name="action" :required="true" data-parsley-errors-container=".error-action">
                                    <x-option value="" :title="__('Chọn hành động')" />
                                    <x-option value="delete" :title="__('Xóa')" />
                                </x-select>
                                <div class="input-group-append">
                                    <x-button.submit :title="__('Áp dụng')" />
                                </div>
                            </div>
                            <div class="error-action col-12 col-md-6 ml-auto p-0"></div>
                        </div>
                        {{$dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width:900px;'], true)}}
                    </div>
                </x-form>
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
    
</div>
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

    var route = '{{ route("admin.category.selectsearch") }}',
    target = '.select2bs4[name="category[]"]';

</script>

<script src="{{ asset('public/admin/assets/js/datatable.js') }}"></script>


@include('admin.post.script.datatable')

@endpush
