@extends('admin.layout')

@section('title', __('Quản lý Khách hàng'))

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Thông tin Khách hàng') }}</h1>
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
                            {{ __('Sửa khách hàng') }}
                        </h3>
                    </x-card.header>
                </x-slot>
                @include('admin.customer.include.formedit')
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
<x-form id="formDelete" :action="route('admin.customer.delete', $customer->id)" type="delete" />
@endsection
