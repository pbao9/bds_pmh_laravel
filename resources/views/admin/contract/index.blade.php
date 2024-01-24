@extends('admin.layout')

@section('title', __('Quản lý Hợp đồng'))

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-admin.partials.page-header>
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Quản lý Hợp đồng') }}</h1>
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
                                {{ __('Danh sách hợp đồng') }}
                                @isset($admin)
                                    -
                                    <x-link :href="route('admin.admin.edit', $admin->id)" :title="$admin->fullname" />
                                @endisset
                            </h3>
                            <div class="d-flex ml-auto">
                                <x-link :href="route('admin.contract.create')" :title="__('Thêm hợp đồng')"
                                    class="btn btn-sm btn-primary shadow-sm ml-auto mx-2">
                                    <x-link.icon class="fa fa-user-plus px-2" />
                                </x-link>

                                {{-- <x-form id="formMultiple" :action="route('admin.contract.deleteMultiple')" type="delete" :validate="true">

                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm" id="deleteAll">
                                        <i class="fas fa-trash-alt px-2"></i>
                                        {{ __('Xoá hợp đồng') }}
                                    </button>
                                </x-form> --}}
                            </div>

                        </x-card.header>
                    </x-slot>


                    <x-form id="formMultiple" :action="route('admin.contract.multiple')" type="post" :validate="true">
                        <div class="table-responsive position-relative">
                            <div class="select-action-multiple" style="display: none;">
                                <div class="input-group col-12 col-md-6 ml-auto p-0">
                                    <x-select name="action" :required="true"
                                        data-parsley-errors-container=".error-action">
                                        <x-option value="" :title="__('Chọn hành động')" />
                                        <x-option value="delete" :title="__('Xóa')" />
                                    </x-select>
                                    <div class="input-group-append">
                                        <x-button.submit :title="__('Áp dụng')" />
                                    </div>
                                </div>
                                <div class="error-action col-12 col-md-6 ml-auto p-0"></div>
                            </div>
                            {{ $dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width:900px;'], true) }}
                        </div>
                    </x-form>

                    {{-- <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width:1800px;'], true) }}
                    </div> --}}
                </x-card>
            </div><!-- /.col -->
        </x-admin.partials.page-content>
    </div>
    <x-form id="formDelete" action="" type="delete" />
@endsection

@push('plugin-js')
    <script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>
@endpush

@push('js')
    {{ $dataTable->scripts() }}
    @include('admin.contract.include.js')
@endpush
