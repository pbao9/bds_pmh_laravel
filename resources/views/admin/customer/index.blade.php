@extends('admin.layout')

@section('title', __('Quản lý Khách hàng'))

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Quản lý khách hàng') }}</h1>
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
                            {{ __('Danh sách khách hàng') }}
                            @isset($admin)
                                    - 
                                <x-link :href="route('admin.admin.edit', $admin->id)" :title="$admin->fullname" />
                            @endisset
                        </h3>
                        <x-link :href="route('admin.customer.create')" :title="__('Thêm khách hàng')" class="btn btn-sm btn-primary shadow-sm ml-auto">
                            <x-link.icon class="fa fa-user-plus" />
                        </x-link>
                    </x-card.header>
                </x-slot>
                <div class="table-responsive">
                    {{$dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width:1800px;'], true)}}
                </div>
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

<script src="{{ asset('public/admin/assets/js/datatable.js') }}"></script>

{{ $dataTable->scripts() }}

@include('admin.customer.script.datatable')

@endpush
