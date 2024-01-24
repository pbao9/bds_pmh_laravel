@extends('admin.layout')

@section('title', __('Quản lý chủ nhà'))
@push('css')
    <link rel="stylesheet"
        href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Thông tin chủ nhà') }}</h1>
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
                            {{ __('Sửa chủ nhà') }}
                        </h3>
                    </x-card.header>
                </x-slot>
                @include('admin.houseowner.include.formedit')
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
<x-form id="formDelete" :action="route('admin.houseowner.delete', $house_owner->id)" type="delete" />
@endsection
@push('plugin-js')
    <!-- select2 js -->
    <script src="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush
@push('js')
    <script>
        var routeDistrict = '{{ route('admin.address.district.selectsearch') }}';
    </script>
    <script src="{{ asset('public/admin/assets/js/houseowner.js') }}"></script>
@endpush
