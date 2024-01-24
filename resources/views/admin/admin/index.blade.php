@extends('admin.layout')

@section('title', __('Quản lý Admin'))

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Quản lý Admin') }}</h1>
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
                            {{ __('Danh sách quản trị viên') }}
                        </h3>
                        <x-link :href="route('admin.admin.create')" :title="__('Thêm quản trị viên')" class="btn btn-sm btn-primary shadow-sm ml-auto">
                            <x-link.icon class="fa fa-user-plus" />
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

@include('admin.admin.script.datatable')

@endpush
