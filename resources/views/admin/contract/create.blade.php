@extends('admin.layout')

@section('title', __('Quản lý Hợp đồng'))

@push('css')
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endpush

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
                            {{ __('Thêm hợp đồng') }}
                        </h3>
                    </x-card.header>
                </x-slot>

                @include('admin.contract.include.formcreate')
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
@endsection

@push('plugin-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- ckeditor js -->
<script src="{{ asset('public/lib/ckeditor/ckeditor.js') }}"></script>
<!-- select2 js -->
<script src="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- ckfinder js -->
<script src="{{ asset('public/lib/ckfinder/ckfinder.js') }}"></script>
@endpush

@push('js')

<script>
    var routeGetFormCreate = '{{ route("admin.contract.getFormCreate", '') }}';
</script>
<script src="{{ asset('public/admin/assets/js/contract.js') }}"></script>
@endpush
