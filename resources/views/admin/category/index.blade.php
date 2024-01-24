@extends('admin.layout')

@section('title', __('Quản lý danh mục'))

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Quản lý danh mục') }}</h1>
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
                            {{ __('Danh sách danh mục') }}
                        </h3>
                        <x-link :href="route('admin.category.create')" :title="__('Thêm danh mục')" class="btn btn-sm btn-primary shadow-sm ml-auto">
                            <x-link.icon class="fas fa-plus" />
                        </x-link>
                    </x-card.header>
                </x-slot>
                {{$dataTable->table(['class' => 'table table-bordered'], true)}}
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
<x-form id="formDelete" action="" type="delete" />
@endsection

@push('js')

<script src="{{ asset('public/admin/assets/js/datatable.js') }}"></script>

{{ $dataTable->scripts() }}

@include('admin.category.script.datatable')

@endpush
